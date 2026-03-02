<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AiNewsResource\Pages;
use App\Filament\Resources\AiNewsResource\RelationManagers;
use App\Models\AiNews;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AiNewsResource extends Resource
{
    protected static ?string $model = AiNews::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('News Content')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Headline')
                            ->placeholder('Enter a public headline for this news item')
                            ->columnSpanFull(),
                        Forms\Components\Textarea::make('original_text')
                            ->label('Original Text')
                            ->disabled()
                            ->columnSpanFull(),
                        Forms\Components\FileUpload::make('image_path')
                            ->label('Image')
                            ->image()
                            ->directory('news-images')
                            ->columnSpanFull(),
                        Forms\Components\Group::make()->schema([
                            Forms\Components\TextInput::make('insight.category')
                                ->label('Category')
                                ->placeholder('e.g., LLM Models & Research'),
                            Forms\Components\TextInput::make('insight.importance_score')
                                ->label('Importance Score')
                                ->numeric()
                                ->rule('min:7')
                                ->rule('max:10')
                                ->placeholder('7 to 10'),
                        ])->columns(['default' => 2]),
                        Forms\Components\TextInput::make('insight.summary')
                            ->label('Summary')
                            ->placeholder('Enter the quick summary in English')
                            ->columnSpanFull(),
                        Forms\Components\TagsInput::make('insight.key_thoughts')
                            ->label('Key Thoughts')
                            ->placeholder('Type a key thought and press enter')
                            ->columnSpanFull(),
                        Forms\Components\Textarea::make('insight.why_it_matters')
                            ->label('Why it matters')
                            ->placeholder('Enter conclusion/why it matters')
                            ->rows(3)
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('video_url')
                            ->label('Video URL')
                            ->url()
                            ->columnSpanFull(),
                    ]),
                Forms\Components\Section::make('Publishing')
                    ->schema([
                        Forms\Components\Toggle::make('is_published')
                            ->label('Published')
                            ->default(false)
                            ->helperText('Turn this on to display the news on the public website.'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image_path')
                    ->label('Image')
                    ->circular(),
                Tables\Columns\TextColumn::make('title')
                    ->label('Headline')
                    ->searchable()
                    ->sortable()
                    ->placeholder('Draft (No Title)'),
                Tables\Columns\TextColumn::make('video_url')
                    ->label('Video')
                    ->limit(30)
                    ->url(fn ($record) => $record->video_url)
                    ->openUrlInNewTab(),
                Tables\Columns\TextColumn::make('insight.category')
                    ->label('Category')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('insight.importance_score')
                    ->label('Impact')
                    ->badge()
                    ->formatStateUsing(function ($state) {
                        return match (true) {
                            $state >= 9 => 'Critical',
                            $state >= 8 => 'High',
                            $state >= 7 => 'Notable',
                            default => 'None',
                        };
                    })
                    ->colors([
                        'danger' => fn ($state) => $state >= 9,
                        'warning' => fn ($state) => $state >= 8 && $state < 9,
                        'info' => fn ($state) => $state >= 7 && $state < 8,
                        'gray' => fn ($state) => $state < 7 || $state === null,
                    ])
                    ->sortable(),
                Tables\Columns\ToggleColumn::make('is_published')
                    ->label('Published')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Received At')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAiNews::route('/'),
            'create' => Pages\CreateAiNews::route('/create'),
            'edit' => Pages\EditAiNews::route('/{record}/edit'),
        ];
    }
}
