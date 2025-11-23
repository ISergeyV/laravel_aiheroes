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

    /**
     * Главный метод, который выполняется в фоновом режиме.
     * Его задача — управлять всем процессом генерации ответа.
     */
    public function handle(AiSettings $aiSettings, SiteSettings $siteSettings): void
    {
        try {
            // ШАГ 1: ПОЛУЧИТЬ ИНСТРУМЕНТ (AI-ПРОВАЙДЕРА)
            // Мы не знаем, какой именно провайдер нам дадут, но мы знаем, что у него будет метод generateResponse.
            $provider = $this->getAiProvider($aiSettings);

            // ШАГ 2: ПОДГОТОВИТЬ ДАННЫЕ ДЛЯ ПРОМПТА
            // Получаем название компании для персонализации.
            $companyName = $siteSettings->company_name ?? 'your company';

            // Извлекаем из базы данных примеры прошлых ответов мастера (Retrieval-Augmented Generation).
            $examples = Lead::whereNotNull('master_response')
                ->where('service_type', $this->lead->service_type)
                ->where('id', '!=', $this->lead->id)
                ->latest()
                ->limit(3)
                ->get();

            // Собираем финальный промпт, передавая в него все данные.
            $prompt = $this->buildPrompt($companyName, $examples);

            // ШАГ 3: ДЕЛЕГИРОВАТЬ РАБОТУ И ПОЛУЧИТЬ РЕЗУЛЬТАТ
            // Мы вызываем метод generateResponse, не зная, кто его выполнит — Gemini, OpenAI или кто-то еще.
            $generatedText = $provider->generateResponse($prompt);

            // ШАГ 4: СОХРАНИТЬ РЕЗУЛЬТАТ
            // Обновляем наш лид, записывая ответ ИИ и меняя статус.
            $this->lead->update([
                'ai_response' => $generatedText,
                'status' => 'pending_master_review'
            ]);

        } catch (Throwable $e) {
            // Если на любом из шагов произошла ошибка, мы логируем ее и "проваливаем" задачу.
            Log::critical('AI response generation failed for Lead ID: ' . $this->lead->id, [
                'provider' => $aiSettings->active_provider ?? 'unknown',
                'exception' => $e->getMessage(),
            ]);
            $this->fail($e);
        }
    }

    /**
     * Фабричный метод (Factory Method).
     * Его единственная задача — посмотреть на настройки и "произвести" (создать и вернуть)
     * правильный объект AI-провайдера. Это реализация паттерна "Стратегия".
     *
     * @throws \Exception - если ключ API не найден или выбранный провайдер не поддерживается.
     */
    private function getAiProvider(AiSettings $settings): AiProvider
    {
        $providerName = $settings->active_provider;

        switch ($providerName) {
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
                throw new \Exception("Unsupported AI provider: {$providerName}");
        }
    }

    /**
     * Сборщик промпта.
     * Собирает все части информации в единый, структурированный промпт для языковой модели.
     */
    private function buildPrompt(string $companyName, Collection $examples): string
    {
        $clientName = $this->lead->client_full_name ? trim($this->lead->client_full_name) : null;
        $serviceType = $this->lead->service_type;
        $jobDescription = $this->lead->job_description;

        // Формируем блок с примерами, если они были найдены в базе данных.
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

        // Финальный шаблон промпта, который объединяет все части.
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
