<?php

namespace App\Filament\Resources\Legalitas;

use App\Filament\Resources\Legalitas\Pages\CreateLegalitas;
use App\Filament\Resources\Legalitas\Pages\EditLegalitas;
use App\Filament\Resources\Legalitas\Pages\ListLegalitas;
use App\Filament\Resources\Legalitas\Schemas\LegalitasForm;
use App\Filament\Resources\Legalitas\Tables\LegalitasTable;
use App\Models\Legalitas;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;

class LegalitasResource extends Resource
{
    protected static ?string $model = Legalitas::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama')
                    ->label('Nama')
                    ->required(),
                TextInput::make('nomor')
                    ->label('Nomor')
                    ->required(),
                FileUpload::make('file')
                    ->label('File')
                    ->directory('legalitas')
                    ->disk('public')
                    ->required(),
                TextInput::make('keterangan')
                    ->label('Keterangan')
                    ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return LegalitasTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListLegalitas::route('/'),
            'create' => CreateLegalitas::route('/create'),
            'edit' => EditLegalitas::route('/{record}/edit'),
        ];
    }
}
