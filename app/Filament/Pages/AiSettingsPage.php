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

    protected static ?string $navigationGroup = 'Settings';

    protected static ?int $navigationSort = 2;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('AI Provider Configuration')
                    ->description('Select and configure the AI provider for generating responses.')
                    ->schema([
                        Forms\Components\Radio::make('active_provider')
                            ->label('Active AI Provider')
                            ->options([
                                'gemini' => 'Google Gemini',
                                'openai' => 'OpenAI (ChatGPT)',
                                'deepseek' => 'DeepSeek',
                            ])
                            ->required()
                            ->live(), // This is crucial for the dynamic display below

                        Forms\Components\TextInput::make('google_gemini_api_key')
                            ->label('Google Gemini API Key')
                            ->password()
                            ->visible(fn (Forms\Get $get) => $get('active_provider') === 'gemini')
                            ->requiredIf('active_provider', 'gemini'),

                        Forms\Components\TextInput::make('openai_api_key')
                            ->label('OpenAI API Key')
                            ->password()
                            ->visible(fn (Forms\Get $get) => $get('active_provider') === 'openai')
                            ->requiredIf('active_provider', 'openai'),

                        Forms\Components\TextInput::make('deepseek_api_key')
                            ->label('DeepSeek API Key')
                            ->password()
                            ->visible(fn (Forms\Get $get) => $get('active_provider') === 'deepseek')
                            ->requiredIf('active_provider', 'deepseek'),
                    ]),
            ]);
    }
}
