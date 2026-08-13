<?php

namespace App\Filament\Resources\Galleries;

use App\Filament\Resources\Galleries\Pages\CreateGalleries;
use App\Filament\Resources\Galleries\Pages\EditGalleries;
use App\Filament\Resources\Galleries\Pages\ListGalleries;
use App\Filament\Resources\Galleries\Schemas\GalleriesForm;
use App\Filament\Resources\Galleries\Tables\GalleriesTable;
use App\Models\Galleries;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;

class GalleriesResource extends Resource
{
    protected static ?string $model = Galleries::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('judul')
                    ->label('Judul')
                    ->required(),
                TextInput::make('deskripsi')
                    ->label('Deskripsi')
                    ->nullable(),
                FileUpload::make('gambar')
                    ->label('Gambar')
                    ->disk('public')
                    ->directory('galleries')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return GalleriesTable::configure($table);
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
            'index' => ListGalleries::route('/'),
            'create' => CreateGalleries::route('/create'),
            'edit' => EditGalleries::route('/{record}/edit'),
        ];
    }
}
