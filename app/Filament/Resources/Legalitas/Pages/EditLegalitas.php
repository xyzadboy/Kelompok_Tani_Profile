<?php

namespace App\Filament\Resources\Legalitas\Pages;

use App\Filament\Resources\Legalitas\LegalitasResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditLegalitas extends EditRecord
{
    protected static string $resource = LegalitasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
