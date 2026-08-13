<?php

namespace App\Filament\Resources\Blocks;

use App\Filament\Resources\Blocks\Pages\CreateBlocks;
use App\Filament\Resources\Blocks\Pages\EditBlocks;
use App\Filament\Resources\Blocks\Pages\ListBlocks;
use App\Filament\Resources\Blocks\Schemas\BlocksForm;
use App\Filament\Resources\Blocks\Tables\BlocksTable;
use App\Models\Blocks;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;

class BlocksResource extends Resource
{
    protected static ?string $model = Blocks::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
{
    return $schema
        ->components([
            TextInput::make('kode_blok')
                ->label('Kode Blok')
                ->required()
                ->maxLength(20)
                ->unique(ignoreRecord: true)
                ->placeholder('BLK-001'),

            TextInput::make('penanggung_jawab')
                ->label('Penanggung Jawab')
                ->required()
                ->maxLength(100),

            TextInput::make('luas')
                ->label('Luas Lahan')
                ->required()
                ->numeric()
                ->step(0.01)
                ->suffix('Ha'),

            TextInput::make('komoditas')
                ->label('Komoditas Utama')
                ->required()
                ->maxLength(100),

            TextInput::make('latitude')
                ->label('Latitude')
                ->required()
                ->numeric()
                ->step(0.00000001)
                ->placeholder('-0.50123456'),

            TextInput::make('longitude')
                ->label('Longitude')
                ->required()
                ->numeric()
                ->step(0.00000001)
                ->placeholder('117.12345678'),

            Textarea::make('deskripsi')
                ->label('Deskripsi')
                ->nullable()
                ->rows(4)
                ->columnSpanFull(),

            Select::make('status')
                ->label('Status')
                ->options([
                    'aktif' => 'Aktif',
                    'nonaktif' => 'Nonaktif',
                    'perawatan' => 'Perawatan',
                ])
                ->default('aktif')
                ->required(),

            TextInput::make('telepon')
                ->label('Nomor Telepon')
                ->tel()
                ->maxLength(20)
                ->nullable(),

            Textarea::make('alamat')
                ->label('Alamat')
                ->nullable()
                ->rows(3)
                ->columnSpanFull(),

            DatePicker::make('tanggal_tanam')
                ->label('Tanggal Tanam')
                ->nullable(),

            DatePicker::make('tanggal_panen')
                ->label('Tanggal Perkiraan Panen')
                ->nullable(),
        ])
        ->columns(2);
}

    public static function table(Table $table): Table
    {
        return BlocksTable::configure($table);
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
            'index' => ListBlocks::route('/'),
            'create' => CreateBlocks::route('/create'),
            'edit' => EditBlocks::route('/{record}/edit'),
        ];
    }
}
