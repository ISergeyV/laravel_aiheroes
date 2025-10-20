<?php

namespace App\Filament\Resources\PageResource\Pages;

use App\Filament\Resources\PageResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPages extends ListRecords
{
    // Указываем, к какому ресурсу относится эта страница
    protected static string $resource = PageResource::class;

    // Эта функция добавляет кнопку "New page" (Создать страницу) вверху списка
    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
