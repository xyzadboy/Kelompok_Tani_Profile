<?php

namespace App\Filament\Resources\Berandas\Pages;

use App\Filament\Resources\Berandas\BerandaResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditBeranda extends EditRecord
{
    protected static string $resource = BerandaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
