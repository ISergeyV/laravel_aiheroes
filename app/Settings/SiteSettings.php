<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class SiteSettings extends Settings
{
    // Site-wide contact information
    public string $contact_phone;
    public string $contact_email;
    public string $contact_address;
    public string $site_url;

    // Promotional banner settings
    public bool $promo_banner_enabled;
    public string $promo_banner_text;

    /**
     * This static method defines the group key under which the settings are stored.
     */
    public static function group(): string
    {
        return 'site';
    }
}
