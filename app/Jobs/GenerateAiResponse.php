<?php

namespace App\Jobs;

use App\Models\Lead;
use App\Settings\AiSettings;
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
    ) {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(AiSettings $aiSettings): void
    {
        $apiKey = $aiSettings->google_gemini_api_key;

        if (empty($apiKey)) {
            Log::error('Google Gemini API key is not set. Cannot generate AI response for Lead ID: ' . $this->lead->id);
            $this->fail('Google Gemini API key is not set.');
            return;
        }

        $prompt = $this->buildPrompt();

        try {
            // ИСПРАВЛЕНИЕ: Используем URL, подтвержденный пользователем из Google AI Studio
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
                $generatedText = $response->json('candidates.0.content.parts.0.text', 'Sorry, I could not generate a response at the moment.');

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
    private function buildPrompt(): string
    {
        return <<<PROMPT
Ты — вежливый и опытный помощник в компании по ремонту "Handyman CRM". Твоя задача — написать первоначальный ответ клиенту на его заявку. Ответ должен быть профессиональным, но дружелюбным. Не указывай точную цену или сроки, вместо этого заверь клиента, что мастер скоро свяжется с ним для уточнения деталей.

Вот информация из заявки клиента:
- **Тип услуги:** {$this->lead->service_type}
- **Описание проблемы:** {$this->lead->job_description}
- **Срочность:** {$this->lead->urgency_level}

Сформируй ответ на основе этих данных.
PROMPT;
    }
}
