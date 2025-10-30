<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class SiteSettings extends Settings
{
    // Default values are defined here.

    public string $site_name;
    public string $phone;
    public string $email;
    public string $address;

    public bool $promo_banner_enabled;
    public string $promo_banner_text;

    /**
     * This is a special method that tells the settings package
     * what group name to use in the database.
     */
    public static function group(): string
    {
        return 'site';
    }
}
