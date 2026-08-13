<?php

namespace App\Filament\Resources\Legalitas\Pages;

use App\Filament\Resources\Legalitas\LegalitasResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListLegalitas extends ListRecords
{
    protected static string $resource = LegalitasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
