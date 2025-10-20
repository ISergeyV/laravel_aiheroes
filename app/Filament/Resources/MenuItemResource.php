<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MenuItemResource\Pages;
use App\Models\MenuItem;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class MenuItemResource extends Resource
{
    protected static ?string $model = MenuItem::class;

    // Название, которое будет отображаться в меню
    protected static ?string $navigationLabel = 'Menu Items';

    // Иконка для меню
    protected static ?string $navigationIcon = 'heroicon-o-bars-3';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Поле для названия пункта меню
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),

                // Поле для URL
                Forms\Components\TextInput::make('url')
                    ->required()
                    ->maxLength(255),

                // Выпадающий список для выбора родительского пункта.
                // Это ключевой элемент для создания вложенности.
                Forms\Components\Select::make('parent_id')
                    // relationship() автоматически подгрузит названия из связанной модели
                    ->relationship('parent', 'title')
                    // Позволяет искать среди родительских пунктов
                    ->searchable()
                    // Позволяет быстро создать новый родительский пункт, не уходя со страницы
                    ->createOptionForm([
                        Forms\Components\TextInput::make('title')
                            ->required()->maxLength(255),
                        Forms\Components\TextInput::make('url')
                            ->required()->maxLength(255),
                        Forms\Components\TextInput::make('order')
                            ->required()->numeric()->default(0),
                    ]),

                // Поле для порядка сортировки
                Forms\Components\TextInput::make('order')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Колонка для названия
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),

                // Колонка, показывающая название родительского пункта
                Tables\Columns\TextColumn::make('parent.title')
                    ->label('Parent') // Меняем заголовок колонки на "Parent"
                    ->searchable(),

                // Колонка для URL
                Tables\Columns\TextColumn::make('url')
                    ->searchable(),

                // Колонка для сортировки
                Tables\Columns\TextColumn::make('order')
                    ->sortable(), // По этой колонке можно будет сортировать
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            // Сортировка по умолчанию: сначала по родительскому ID, потом по порядку
            ->defaultSort('order', 'asc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMenuItems::route('/'),
            'create' => Pages\CreateMenuItem::route('/create'),
            'edit' => Pages\EditMenuItem::route('/{record}/edit'),
        ];
    }
}
