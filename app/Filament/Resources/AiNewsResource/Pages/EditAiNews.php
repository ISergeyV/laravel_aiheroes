<?php

namespace App\Filament\Resources\AiNewsResource\Pages;

use App\Filament\Resources\AiNewsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAiNews extends EditRecord
{
    protected static string $resource = AiNewsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
