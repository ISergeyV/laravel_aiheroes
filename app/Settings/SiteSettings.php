<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class SiteSettings extends Settings
{
    // Site-wide contact information
    public string $contact_phone='';
    public string $contact_email='';
    public string $contact_address = '';
    public string $site_url = '';
    public string $company_name = '';
    public string $notification_recipient_email = '';

    // Promotional banner settings
    public bool $promo_banner_enabled = true;
    public string $promo_banner_text = '';

    /**
     * This static method defines the group key under which the settings are stored.
     */
    public static function group(): string
    {
        return 'site';
    }
}
