<?php

namespace App\Filament\Resources\Berandas;

use App\Filament\Resources\Berandas\Pages\CreateBeranda;
use App\Filament\Resources\Berandas\Pages\EditBeranda;
use App\Filament\Resources\Berandas\Pages\ListBerandas;
use App\Filament\Resources\Berandas\Schemas\BerandaForm;
use App\Filament\Resources\Berandas\Tables\BerandasTable;
use App\Models\Beranda;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;


class BerandaResource extends Resource
{
    protected static ?string $model = Beranda::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'beranda';
public static function shouldRegisterNavigation(): bool
{
    return false;
}
    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('logo')
                    ->label('Logo')
                    ->image()
                    ->directory('logo')
                    ->disk('public')
                    ->required(),
                TextInput::make('visi')
                    ->label('Visi')
                    ->required(),
                TextInput::make('misi')
                    ->label('Misi')
                    ->required(),
                TextInput::make('sejarah')
                    ->label('Sejarah')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return BerandasTable::configure($table);
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
            'index' => ListBerandas::route('/'),
            'create' => CreateBeranda::route('/create'),
            'edit' => EditBeranda::route('/{record}/edit'),
        ];
    }
}
