<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class AiSettings extends Settings
{
    public ?string $google_gemini_api_key;

    public static function group(): string
    {
        return 'ai';
    }
}
