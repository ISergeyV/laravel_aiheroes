<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageResource\Pages;
use App\Models\Page;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class PageResource extends Resource
{
    // Эта строка связывает наш ресурс с моделью Page, которую мы создали ранее.
    protected static ?string $model = Page::class;

    // Эта иконка будет отображаться в меню админ-панели.
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required() // Обязательное для заполнения
                    ->maxLength(255) // Максимальная длина 255 символов
                    // Эта функция будет автоматически генерировать slug из заголовка,
                    // когда вы будете печатать.
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (Forms\Set $set, ?string $state) => $set('slug', Str::slug($state))),

                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(255)
                    // Проверяет, что slug уникален в таблице `pages`
                    ->unique(Page::class, 'slug', ignoreRecord: true),

                // Поле для контента с визуальным редактором (WYSIWYG)
                Forms\Components\RichEditor::make('content')
                    ->required()
                    ->toolbarButtons([
                        'attachFiles',
                        'blockquote',
                        'bold',
                        'bulletList',
                        'codeBlock',
                        'h2',
                        'h3',
                        'italic',
                        'link',
                        'orderedList',
                        'redo',
                        'strike',
                        'table', // <-- Explicitly enabled table button
                        'undo',
                        'source', // <-- Explicitly enabled source view button
                    ])
                    ->columnSpanFull(),
            ]);
    }

    /**
     * Эта функция описывает, как будет выглядеть таблица со списком всех страниц.
     */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(), // По этой колонке можно будет искать

                // Колонка для slug
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
            ])
            ->filters([
                // Здесь можно добавить фильтры, если нужно
            ])
            ->actions([
                // Добавляет кнопку "Edit" (Редактировать) для каждой строки
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                // Добавляет возможность массового удаления
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            // Здесь можно определить связанные ресурсы, если они есть
        ];
    }

    /**
     * Эта функция определяет, какие страницы (представления) будут у нашего ресурса.
     * По умолчанию это список, создание и редактирование.
     */
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPages::route('/'),
            'create' => Pages\CreatePage::route('/create'),
            'edit' => Pages\EditPage::route('/{record}/edit'),
        ];
    }
}
