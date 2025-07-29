<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LeadResource\Pages;
use App\Models\Lead;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Infolists;
use Filament\Infolists\Infolist;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;

// <-- Убедитесь, что этот use на месте!

class LeadResource extends Resource
{
    protected static ?string $model = Lead::class;

    // Иконка для меню навигации
    protected static ?string $navigationIcon = 'heroicon-o-inbox-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Разделим форму на логические секции для удобства
                Forms\Components\Section::make('Client Information')
                    ->schema([
                        Forms\Components\TextInput::make('client_full_name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('client_phone')
                            ->tel()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('client_email')
                            ->email()
                            ->maxLength(255),
                        Forms\Components\Textarea::make('service_address')
                            ->required()
                            ->columnSpanFull(), // Растягиваем на всю ширину
                    ])->columns(2), // Поля в 2 колонки

                Forms\Components\Section::make('Job Details')
                    ->schema([
                        // Выпадающие списки вместо текстовых полей
                        Forms\Components\Select::make('status')
                            ->options([
                                'new' => 'New',
                                'in_progress' => 'In Progress',
                                'completed' => 'Completed',
                                'cancelled' => 'Cancelled',
                            ])
                            ->required()
                            ->default('new'),
                        Forms\Components\Select::make('service_type')
                            ->options([
                                'furniture_assembly' => 'Furniture Assembly',
                                'painting' => 'Painting',
                                'flooring' => 'Flooring',
                                'tile' => 'Tile',
                                'drywall' => 'Drywall',
                                'minor_plumbing' => 'Minor Plumbing',
                                'minor_electrical' => 'Minor Electrical',
                            ])
                            ->required(),
                        Forms\Components\Select::make('urgency_level')
                            ->options([
                                'low' => 'Low',
                                'medium' => 'Medium',
                                'high' => 'High',
                                'emergency' => 'Emergency',
                            ])
                            ->required(),
                        Forms\Components\TextInput::make('estimated_budget')
                            ->prefix('$') // Добавим значок доллара
                            ->numeric(),
                        Forms\Components\Textarea::make('job_description')
                            ->required()
                            ->columnSpanFull(),
                        // Поле для загрузки файлов
                        Forms\Components\FileUpload::make('uploaded_files_urls')
                            ->multiple()
                            ->directory('lead-files')
                            ->preserveFilenames(),
                        Forms\Components\Textarea::make('internal_notes')
                            ->label('Internal Notes (Visible only to admin)')
                            ->columnSpanFull(),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('client_full_name')
                    ->searchable()
                    ->sortable(),
                // Статус в виде цветного бейджа
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'new' => 'primary',
                        'in_progress' => 'warning',
                        'completed' => 'success',
                        'cancelled' => 'danger',
                        default => 'gray',
                    })
                    ->searchable(),
                Tables\Columns\TextColumn::make('service_type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('client_phone')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true), // Скрыт по умолчанию
                Tables\Columns\TextColumn::make('client_email')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true), // Скрыт по умолчанию
                // Наша колонка, теперь видима по умолчанию
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('M d, Y') // Более читаемый формат даты
                    ->sortable()
                    ->toggleable(), // Видима по умолчанию, но можно скрыть
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime('M d, Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('created_at', 'desc') // Сортируем по умолчанию: новые заявки сверху
            ->filters([
                // Добавим фильтр по статусу
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'new' => 'New',
                        'in_progress' => 'In Progress',
                        'completed' => 'Completed',
                        'cancelled' => 'Cancelled',
                    ])
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(), // Добавим кнопку просмотра
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    // Массовое действие для изменения статуса
                    Tables\Actions\BulkAction::make('change_status_to_completed')
                        ->label('Mark as Completed')
                        ->icon('heroicon-o-check-circle')
                        ->color('success')
                        ->action(fn(Collection $records) => $records->each->update(['status' => 'completed'])),
                ]),
            ]);
    }


    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Infolists\Components\Section::make('Client Information')
                    ->schema([
                        Infolists\Components\TextEntry::make('client_full_name'),
                        Infolists\Components\TextEntry::make('client_phone')
                            ->icon('heroicon-m-phone'),
                        Infolists\Components\TextEntry::make('client_email')
                            ->icon('heroicon-m-envelope'),
                        Infolists\Components\TextEntry::make('service_address')
                            ->columnSpanFull(),
                    ])->columns(2),

                Infolists\Components\Section::make('Job Details')
                    ->schema([
                        Infolists\Components\TextEntry::make('status')
                            ->badge()
                            ->color(fn(string $state): string => match ($state) {
                                'new' => 'primary',
                                'in_progress' => 'warning',
                                'completed' => 'success',
                                'cancelled' => 'danger',
                                default => 'gray',
                            }),
                        Infolists\Components\TextEntry::make('service_type'),
                        Infolists\Components\TextEntry::make('urgency_level'),
                        Infolists\Components\TextEntry::make('estimated_budget')
                            ->money('USD'),
                        Infolists\Components\TextEntry::make('job_description')
                            ->columnSpanFull(),

                        // ==========================================================
                        // === ВОТ ТА САМАЯ МАГИЯ ДЛЯ ОТОБРАЖЕНИЯ ИЗОБРАЖЕНИЙ ===
                        // ==========================================================
                        Infolists\Components\Grid::make(4) // Создаем сетку для красивого отображения
                        ->schema([
                            Infolists\Components\RepeatableEntry::make('uploaded_files_urls')
                                ->label('Attached Files')
                                ->schema([
                                    Infolists\Components\ImageEntry::make('')
                                        ->label('') // Убираем лишний заголовок для каждого фото
                                        ->height(150)
                                        ->disk('private') // Указываем, что файлы в private диске
                                        ->visibility('private')
                                        ->url(fn($state) => Storage::disk('private')->temporaryUrl(
                                            "leads_attachments/{$state}",
                                            now()->addMinutes(5)
                                        )
                                        )
                                        ->extraImgAttributes([
                                            'loading' => 'lazy', // Ленивая загрузка для скорости
                                        ]),
                                ])
                                ->hiddenLabel() // Скрываем общий заголовок "Attached Files"
                                ->columnSpanFull(),
                        ])
                            // Показываем этот блок, только если файлы действительно есть
                            ->visible(fn(Lead $record): bool => !empty($record->uploaded_files_urls)),

                        Infolists\Components\TextEntry::make('internal_notes')
                            ->columnSpanFull(),
                    ])->columns(2),
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
            'index' => Pages\ListLeads::route('/'),
            'create' => Pages\CreateLead::route('/create'),
//            'view' => Pages\ViewLead::route('/{record}'), // Добавим страницу просмотра
            'edit' => Pages\EditLead::route('/{record}/edit'),
        ];
    }
}
