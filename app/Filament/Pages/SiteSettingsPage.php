<?php

namespace App\Filament\Pages;

use App\Settings\SiteSettings;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;

class SiteSettingsPage extends SettingsPage
{
    // This links the page to our settings class.
    protected static string $settings = SiteSettings::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static ?string $navigationGroup = 'Site Management';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Contact Information')
                    ->description('These details will be displayed across the website.')
                    ->schema([
                        Forms\Components\TextInput::make('contact_phone')
                            ->label('Contact Phone')
                            ->mask('+1 (999) 999-9999') // Added input mask for consistent formatting.
                            ->placeholder('+1 (949) 414-4998') // Added a placeholder for better UX.
                            ->tel() // Keep the tel type for mobile keyboards.
                            ->required(),
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
