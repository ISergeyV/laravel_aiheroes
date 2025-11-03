<?php

namespace App\Filament\Pages;

use App\Settings\SiteSettings;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;
use Illuminate\Support\Str;

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
                            ->placeholder('+1 (949) 414-4998')
                            // We replace ->tel() with explicit attributes to avoid its implicit validation rule.
                            // We use extraInputAttributes to target the <input> tag directly,
                            // not its wrapper div. This is the correct method for this task.
                            ->extraInputAttributes(['type' => 'tel'])
                            ->required()
                            // This rule validates the RAW masked input. It must exactly match the mask format.
                            ->rule('regex:/^\+1 \(\d{3}\) \d{3}-\d{4}$/')
                            // Dehydration runs AFTER successful validation to clean the data for storage.
                            ->dehydrateStateUsing(static function (string $state): string {
                                // We strip all non-digit characters to store a clean number.
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
