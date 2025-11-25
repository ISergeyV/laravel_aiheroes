<?php

use Illuminate\Database\Migrations\Migration;
use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration {
    public function up(): void
    {
        // Добавляем все поля AI настроек
        $this->migrator->add('ai.active_provider', 'gemini');
        $this->migrator->add('ai.google_gemini_api_key', null);
        $this->migrator->add('ai.openai_api_key', null);
        $this->migrator->add('ai.deepseek_api_key', null);
    }

    public function down(): void
    {
        $this->migrator->delete('ai.active_provider');
        $this->migrator->delete('ai.google_gemini_api_key');
        $this->migrator->delete('ai.openai_api_key');
        $this->migrator->delete('ai.deepseek_api_key');
    }
};
