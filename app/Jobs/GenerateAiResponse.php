<?php

namespace App\Jobs;

use App\Models\Lead;
use App\Services\AiProviders\AiProvider;
use App\Services\AiProviders\DeepSeekProvider;
use App\Services\AiProviders\GeminiProvider;
use App\Services\AiProviders\OpenAiProvider;
use App\Settings\AiSettings;
use App\Settings\SiteSettings;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Throwable;

class GenerateAiResponse implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(public Lead $lead)
    {
    }

    public function handle(AiSettings $aiSettings, SiteSettings $siteSettings): void
    {
        try {
            $provider = $this->getAiProvider($aiSettings);
        } catch (\Exception $e) {
            Log::error('Failed to get AI provider for Lead ID: ' . $this->lead->id, ['error' => $e->getMessage()]);
            $this->fail($e);
            return;
        }

        $companyName = $siteSettings->company_name ?? 'your company';

        $examples = Lead::whereNotNull('master_response')
            ->where('service_type', $this->lead->service_type)
            ->where('id', '!=', $this->lead->id)
            ->latest()
            ->limit(3)
            ->get();

        $prompt = $this->buildPrompt($companyName, $examples);

        try {
            $generatedText = $provider->generateResponse($prompt);

            $this->lead->update([
                'ai_response' => $generatedText,
                'status' => 'pending_master_review'
            ]);
        } catch (Throwable $e) {
            Log::critical('AI response generation failed for Lead ID: ' . $this->lead->id, [
                'provider' => $aiSettings->active_provider,
                'exception' => $e->getMessage(),
            ]);
            $this->fail($e);
        }
    }

    /**
     * @throws \Exception
     */
    private function getAiProvider(AiSettings $settings): AiProvider
    {
        $provider = $settings->active_provider;
        $apiKey = null;

        switch ($provider) {
            case 'gemini':
                $apiKey = $settings->google_gemini_api_key;
                if (empty($apiKey)) throw new \Exception('Google Gemini API key is not set.');
                return new GeminiProvider($apiKey);
            case 'openai':
                $apiKey = $settings->openai_api_key;
                if (empty($apiKey)) throw new \Exception('OpenAI API key is not set.');
                return new OpenAiProvider($apiKey);
            case 'deepseek':
                $apiKey = $settings->deepseek_api_key;
                if (empty($apiKey)) throw new \Exception('DeepSeek API key is not set.');
                return new DeepSeekProvider($apiKey);
            default:
                throw new \Exception("Unsupported AI provider: {$provider}");
        }
    }

    private function buildPrompt(string $companyName, Collection $examples): string
    {
        $clientName = $this->lead->client_full_name ? trim($this->lead->client_full_name) : null;
        $serviceType = $this->lead->service_type;
        $jobDescription = $this->lead->job_description;

        $examplesText = '';
        if ($examples->isNotEmpty()) {
            $examplesText .= "Here are some examples of how a master technician has responded to similar requests:\n\n";
            foreach ($examples as $index => $example) {
                $examplesText .= "--- Example " . ($index + 1) . " ---\n";
                $examplesText .= "**Client's Request:** \"" . addslashes($example->job_description) . "\"\n";
                $examplesText .= "**Master's Correct Response:** \"" . addslashes($example->master_response) . "\"\n\n";
            }
            $examplesText .= "--- End of Examples ---\n\n";
        }

        $greeting = $clientName ? "Dear {$clientName}," : "Hello,";

        return <<<PROMPT
You are a proactive and intelligent assistant for a repair company called "{$companyName}".
Your primary goal is to qualify new leads by asking clarifying questions to gather enough information for a technician to create an estimate.

**Your Task:**
1.  Analyze the customer's request below.
2.  Determine if there is missing information needed for an estimate.
    - For **Painting**: We need the approximate square footage (or room dimensions) and the number of rooms.
    - For **Furniture Assembly**: We need the name of the item (e.g., "IKEA PAX Wardrobe") or a link to the product page.
    - For **Plumbing/Electrical**: We need more specific details about the issue (e.g., "kitchen sink is clogged," "outlet is not working").
3.  If information is missing, your response MUST politely ask the necessary clarifying questions.
4.  If the customer has already provided all necessary details, simply confirm receipt of their request and inform them that a technician will be in touch.
5.  Always start the response with a proper greeting. Use the customer's name if available.
6.  Maintain a professional and friendly tone.

{$examplesText}
**Now, analyze the following new request and generate a response.**

**Customer's Name:** {$clientName ?? 'Not provided'}
**Service Type:** {$serviceType}
**Problem Description:** "{$jobDescription}"

**Instructions for your response:**
- Start with the greeting: "{$greeting}"
- If asking questions, be specific. For example: "To help us prepare an accurate estimate for your painting project, could you please provide the approximate square footage of the rooms?"
- End by assuring them that once they provide the information, we can move forward, or that a technician will be in touch.

Formulate the new response now.
PROMPT;
    }
}
