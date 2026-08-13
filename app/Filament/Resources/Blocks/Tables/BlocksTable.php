<?php

namespace App\Filament\Resources\Blocks\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class BlocksTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('kode_blok')
                    ->label('Kode Blok')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('penanggung_jawab')
                    ->label('Penanggung Jawab')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('luas')
                    ->label('Luas')
                    ->numeric(decimalPlaces: 2)
                    ->suffix(' Ha')
                    ->sortable(),

                TextColumn::make('komoditas')
                    ->label('Komoditas')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('latitude')
                    ->label('Latitude')
                    ->numeric(decimalPlaces: 8),

                TextColumn::make('longitude')
                    ->label('Longitude')
                    ->numeric(decimalPlaces: 8),

                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'aktif' => 'success',
                        'nonaktif' => 'danger',
                        'perawatan' => 'warning',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'aktif' => 'Aktif',
                        'nonaktif' => 'Nonaktif',
                        'perawatan' => 'Perawatan',
                        default => ucfirst($state),
                    }),

                TextColumn::make('telepon')
                    ->label('Telepon')
                    ->searchable(),

                TextColumn::make('tanggal_tanam')
                    ->label('Tanggal Tanam')
                    ->date('d M Y')
                    ->sortable(),

                TextColumn::make('tanggal_panen')
                    ->label('Tanggal Panen')
                    ->date('d M Y')
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->label('Diperbarui')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
