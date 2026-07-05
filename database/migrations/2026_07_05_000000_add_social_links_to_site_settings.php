<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('site.twitter_url', null);
        $this->migrator->add('site.twitter_enabled', true);
        
        $this->migrator->add('site.linkedin_url', null);
        $this->migrator->add('site.linkedin_enabled', true);
        
        $this->migrator->add('site.instagram_url', null);
        $this->migrator->add('site.instagram_enabled', true);
    }

    public function down(): void
    {
        $this->migrator->delete('site.twitter_url');
        $this->migrator->delete('site.twitter_enabled');
        
        $this->migrator->delete('site.linkedin_url');
        $this->migrator->delete('site.linkedin_enabled');
        
        $this->migrator->delete('site.instagram_url');
        $this->migrator->delete('site.instagram_enabled');
    }
};
