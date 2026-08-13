<?php

namespace App\Filament\Resources\Berandas\Pages;

use App\Filament\Resources\Berandas\BerandaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListBerandas extends ListRecords
{
    protected static string $resource = BerandaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
