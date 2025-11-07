<?php

namespace App\Jobs;

use App\Models\Lead;
use App\Settings\AiSettings;
use App\Settings\SiteSettings;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
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
    )
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(AiSettings $aiSettings, SiteSettings $siteSettings): void
    {
        $apiKey = $aiSettings->google_gemini_api_key;
        $companyName = $siteSettings->company_name ?? 'your company'; // Fallback in case the name is not set

        if (empty($apiKey)) {
            Log::error('Google Gemini API key is not set. Cannot generate AI response for Lead ID: ' . $this->lead->id);
            $this->fail('Google Gemini API key is not set.');
            return;
        }

        $prompt = $this->buildPrompt($companyName);

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
    private function buildPrompt(string $companyName): string
    {
        // Sanitize variables to be injected into the prompt
        $serviceType = addslashes($this->lead->service_type);
        $jobDescription = addslashes($this->lead->job_description);
        $urgencyLevel = addslashes($this->lead->urgency_level);

        return <<<PROMPT
You are a polite and experienced assistant for a repair company called "{$companyName}". Your task is to write an initial response to a customer's request. The response should be professional but friendly. Do not provide an exact price or timeline; instead, assure the customer that a technician will contact them soon to clarify the details.

Here is the information from the customer's request:
- **Service Type:** {$serviceType}
- **Problem Description:** {$jobDescription}
- **Urgency Level:** {$urgencyLevel}

Formulate a response based on this data.
Using English.
PROMPT;
    }
}
