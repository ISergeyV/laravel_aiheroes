<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class SiteSettings extends Settings
{
    // Site-wide contact information
    public string $contact_phone = '';
    public string $contact_email = '';
    public string $contact_address = '';
    public string $site_url = '';
    public string $company_name = '';
    public ?string $company_logo = null;
    public string $notification_recipient_email = '';

    public ?string $company_slogan = null;
    public ?string $hero_image = null;

    // Promotional banner settings
    public bool $promo_banner_enabled = true;
    public string $promo_banner_text = '';

    // Social Media Links
    public ?string $twitter_url = null;
    public bool $twitter_enabled = true;
    public ?string $linkedin_url = null;
    public bool $linkedin_enabled = true;
    public ?string $instagram_url = null;
    public bool $instagram_enabled = true;
    public ?string $youtube_url = null;
    public bool $youtube_enabled = true;

    /**
     * This static method defines the group key under which the settings are stored.
     */
    public static function group(): string
    {
        return 'site';
    }
}
