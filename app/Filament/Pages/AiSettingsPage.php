<?php

namespace App\Filament\Pages;

use App\Settings\AiSettings;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;

class AiSettingsPage extends SettingsPage
{
    protected static ?string $navigationIcon = 'heroicon-o-sparkles';

    protected static string $settings = AiSettings::class;

    protected static ?string $navigationGroup = 'Site Management'; //'Settings';

    protected static ?int $navigationSort = 2;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Google Gemini')
                    ->description('Настройки для интеграции с ИИ от Google.')
                    ->schema([
                        Forms\Components\TextInput::make('google_gemini_api_key')
                            ->label('API Key for Google Gemini')
                            ->password()
                            ->required()
                            ->helperText('Получите ваш ключ в Google AI Studio.'),
                    ]),
            ]);
    }
}
