<?php

namespace App\Filament\Resources\ContactPeople;

use App\Filament\Resources\ContactPeople\Pages\CreateContactPerson;
use App\Filament\Resources\ContactPeople\Pages\EditContactPerson;
use App\Filament\Resources\ContactPeople\Pages\ListContactPeople;
use App\Filament\Resources\ContactPeople\Schemas\ContactPersonForm;
use App\Filament\Resources\ContactPeople\Tables\ContactPeopleTable;
use App\Models\ContactPerson;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;

class ContactPersonResource extends Resource
{
    protected static ?string $model = ContactPerson::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return $schema
        ->components([
            TextInput::make('nama')
            ->required(),
            TextInput::make('posisi')
            ->nullable(),
            TextInput::make('nomor')
            ->required()
            ->numeric(),
            TextInput::make('email')
            ->nullable(),
            FileUpload::make('foto')
            ->nullable(),
            TextInput::make('deskripsi')
            ->nullable(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return ContactPeopleTable::configure($table);
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
            'index' => ListContactPeople::route('/'),
            'create' => CreateContactPerson::route('/create'),
            'edit' => EditContactPerson::route('/{record}/edit'),
        ];
    }
}
