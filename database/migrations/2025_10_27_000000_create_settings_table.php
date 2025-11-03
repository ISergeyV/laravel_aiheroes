<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends SettingsMigration
{
    public function up(): void
    {
        // Use the standard Laravel Schema builder to create the table.
        Schema::create('settings', function (Blueprint $table) {
            $table->string('group');
            $table->string('name');
            $table->boolean('locked')->default(false);
            $table->json('payload');
            $table->timestamps();

            // This composite primary key is the crucial fix.
            // It allows multiple settings per group, as long as the name is unique within that group.
            $table->primary(['group', 'name']);
        });

        // The migrator is used for adding/updating properties.
        $this->migrator->add('site.contact_phone', '+1 949 414-4998');
        $this->migrator->add('site.contact_email', 'info@mreurofix.com');
        $this->migrator->add('site.contact_address', 'Orange County, California');
        $this->migrator->add('site.site_url', 'https://www.mreurofix.com');
        $this->migrator->add('site.promo_banner_enabled', true);
        $this->migrator->add('site.promo_banner_text', '10% OFF on 1st Order 🎁');
    }

    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
