<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('site.youtube_url', null);
        $this->migrator->add('site.youtube_enabled', true);
    }

    public function down(): void
    {
        $this->migrator->delete('site.youtube_url');
        $this->migrator->delete('site.youtube_enabled');
    }
};
