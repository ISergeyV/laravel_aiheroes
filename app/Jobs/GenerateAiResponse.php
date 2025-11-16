<?php

namespace App\Jobs;

use App\Models\Lead;
use App\Settings\AiSettings;
use App\Settings\SiteSettings;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Throwable;

class GenerateAiResponse implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public Lead $lead
    ) {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(AiSettings $aiSettings, SiteSettings $siteSettings): void
    {
        $apiKey = $aiSettings->google_gemini_api_key;
        $companyName = $siteSettings->company_name ?? 'your company';

        if (empty($apiKey)) {
            Log::error('Google Gemini API key is not set. Cannot generate AI response for Lead ID: ' . $this->lead->id);
            $this->fail('Google Gemini API key is not set.');
            return;
        }

        // 1. RETRIEVAL: Find relevant examples
        $examples = Lead::whereNotNull('master_response')
            ->where('service_type', $this->lead->service_type)
            ->where('id', '!=', $this->lead->id)
            ->latest() // Get the most recent ones
            ->limit(3)   // Limit to 3 examples
            ->get();

        // 2. AUGMENTATION: Build the prompt with the examples
        $prompt = $this->buildPrompt($companyName, $examples);

        try {
            $response = Http::withOptions([
                'timeout' => 60,
            ])->post("https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key={$apiKey}", [
                'contents' => [
                    [
                        'parts' => [
                            ['text' => $prompt]
                        ]
                    ]
                ]
            ]);

            if ($response->successful()) {
                $generatedText = $response->json('candidates.0.content.parts.0.text', 'Sorry, we could not generate a response at the moment. A technician will contact you shortly.');

                $this->lead->update([
                    'ai_response' => $generatedText,
                    'status' => 'pending_master_review'
                ]);
            } else {
                Log::error('Google Gemini API request failed for Lead ID: ' . $this->lead->id, [
                    'status' => $response->status(),
                    'body' => $response->body(),
                ]);
                $this->fail('Google Gemini API request failed with status: ' . $response->status() . ' - Check model name and API endpoint.');
            }
        } catch (Throwable $e) {
            Log::critical('An unexpected error occurred while generating AI response for Lead ID: ' . $this->lead->id, [
                'exception' => $e->getMessage(),
            ]);
            $this->fail($e);
        }
    }

    /**
     * Build the prompt for the AI model.
     */
    private function buildPrompt(string $companyName, Collection $examples): string
    {
        $serviceType = addslashes($this->lead->service_type);
        $jobDescription = addslashes($this->lead->job_description);

        $examplesText = '';
        if ($examples->isNotEmpty()) {
            $examplesText .= "Here are some examples of how a master technician has responded to similar requests in the past:\n\n";
            foreach ($examples as $index => $example) {
                $exampleRequest = addslashes($example->job_description);
                $exampleResponse = addslashes($example->master_response);
                $examplesText .= "--- Example " . ($index + 1) . " ---\n";
                $examplesText .= "**Client's Request:** \"{$exampleRequest}\"\n";
                $examplesText .= "**Master's Correct Response:** \"{$exampleResponse}\"\n\n";
            }
            $examplesText .= "--- End of Examples ---\n\n";
        }

        return <<<PROMPT
You are a polite and experienced assistant for a repair company called "{$companyName}".
Your task is to write an initial response to a new customer's request.
The response should be professional, friendly, and based on the style of the examples provided.
Do not provide an exact price or timeline; instead, assure the customer that a technician will contact them soon.

{$examplesText}Now, based on those examples, write a response for the FOLLOWING NEW REQUEST:
- **Service Type:** {$serviceType}
- **Problem Description:** {$jobDescription}

Formulate the new response.
PROMPT;
    }
}
