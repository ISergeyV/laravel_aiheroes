<?php

namespace App\Filament\Resources\PageResource\Pages;

use App\Filament\Resources\PageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPage extends EditRecord
{
    // Указываем, к какому ресурсу относится эта страница
    protected static string $resource = PageResource::class;

    // Эта функция добавляет кнопку "Delete" (Удалить) на страницу редактирования
    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
