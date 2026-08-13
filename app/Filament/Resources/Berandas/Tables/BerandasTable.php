<?php

namespace App\Filament\Resources\Berandas\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

class BerandasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('logo')
                    ->label('Logo')
                    ->sortable()
                    ->disk('public')
                    ->searchable(),
                TextColumn::make('visi')
                    ->label('Visi')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('misi')
                    ->label('Misi')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('sejarah')
                    ->label('Sejarah')
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
