<?php

namespace App\Jobs;

use App\Models\Lead;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

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
    public function handle(): void
    {
        // Здесь будет логика обращения к API языковой модели
        // 1. Собрать промпт на основе данных из $this->lead
        // 2. Отправить запрос к LLM API
        // 3. Получить ответ
        // 4. Сохранить ответ в $this->lead->ai_response
        // 5. Изменить статус лида
    }
}
