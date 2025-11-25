<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration {
    public function up(): void
    {
        // Добавляем все поля SiteSettings
        $this->migrator->add('site.company_name', 'My Company');
        $this->migrator->add('site.notification_recipient_email', 'admin@example.com');
        $this->migrator->add('site.company_slogan', 'Your Slogan Here');
        $this->migrator->add('site.hero_image', null);
        // ... добавьте остальные поля из SiteSettings
    }

    public function down(): void
    {
        $this->migrator->delete('site.company_name');
        $this->migrator->delete('site.notification_recipient_email');
        $this->migrator->delete('site.company_slogan');
        $this->migrator->delete('site.hero_image');
    }
};
