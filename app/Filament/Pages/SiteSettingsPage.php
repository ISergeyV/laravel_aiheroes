<?php

namespace App\Filament\Pages;

use App\Settings\SiteSettings;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;
use Illuminate\Support\Str;

class SiteSettingsPage extends SettingsPage
{
    protected static string $settings = SiteSettings::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static ?string $navigationGroup = 'Site Management';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Site Branding')
                    ->description('Settings for the company logo, slogan, and Homepage image.')
                    ->schema([
                        Forms\Components\TextInput::make('company_name')
                            ->label('Company Name / LOGO')
                            ->required(),
                        Forms\Components\TextInput::make('company_slogan')
                            ->label('Company Slogan')
                            ->helperText('A short tagline that appears below the company name.'),
                        Forms\Components\FileUpload::make('hero_image')
                            ->label('Homepage Image')
                            ->image()
                            ->disk('public') // <-- Explicitly set the disk for clarity
                            ->directory('site-assets')
                            ->visibility('public') // <-- Important: makes files publicly accessible
                            ->helperText('Recommended: 1920x1080px (16:9 aspect ratio). The image will cover the full screen and will be cropped on different screen sizes. Keep the main subject near the center, as the edges may not be visible on mobile or widescreen displays.'),
                    ])->columns(2),

                Forms\Components\Section::make('Contact & Notifications')
                    ->description('These details will be displayed across the website and used for notifications.')
                    ->schema([
                        Forms\Components\TextInput::make('notification_recipient_email')
                            ->label('New Lead Notification Email')
                            ->email()
                            ->required()
                            ->columnSpanFull()
                            ->helperText('The email address that receives a notification when a new lead is submitted.'),
                        Forms\Components\TextInput::make('contact_phone')
                            ->label('Contact Phone')
                            ->mask('+1 (999) 999-9999')
                            ->placeholder('+1 (949) 414-4998')
                            ->extraInputAttributes(['type' => 'tel'])
                            ->required()
                            ->rule('regex:/^\+1 \(\d{3}\) \d{3}-\d{4}$/')
                            ->dehydrateStateUsing(static function (string $state): string {
                                return Str::of($state)->replaceMatches('/\D/', '');
                            }),
                        Forms\Components\TextInput::make('contact_email')
                            ->label('Contact Email')
                            ->email()
                            ->required(),
                        Forms\Components\TextInput::make('contact_address')
                            ->label('Contact Address')
                            ->required(),
                        Forms\Components\TextInput::make('site_url')
                            ->label('Site URL')
                            ->url()
                            ->required(),
                    ])->columns(2),

                Forms\Components\Section::make('Promotional Banner')
                    ->description('Controls the visibility and text of the top promotional banner.')
                    ->schema([
                        Forms\Components\Toggle::make('promo_banner_enabled')
                            ->label('Enable Promotional Banner'),
                        Forms\Components\TextInput::make('promo_banner_text')
                            ->label('Banner Text')
                            ->required(),
                    ]),
            ]);
    }
}
