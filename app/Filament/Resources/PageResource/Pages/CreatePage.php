<?php

namespace App\Filament\Resources\PageResource\Pages;

use App\Filament\Resources\PageResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePage extends CreateRecord
{
    // Указываем, к какому ресурсу относится эта страница
    protected static string $resource = PageResource::class;
}
