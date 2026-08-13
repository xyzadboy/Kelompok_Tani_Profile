<?php

namespace App\Filament\Resources\Blogs\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

class BlogsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('judul'),
                TextColumn::make('slug'),
                ImageColumn::make('thumbnail')
                ->disk('public'),
                  TextColumn::make('isi')
                    ->label('Konten')
                    ->limit(150) // Batasi 150 karakter
                    ->wrap() // ✅ WRAP: turun ke bawah otomatis
                    ->tooltip(fn ($state) => strip_tags($state))
                    ->width('400px'),

                TextColumn::make('published_at')
    ->dateTime('d M Y H:i')
    ->sortable()
    ->placeholder('-') // Jika NULL tampilkan "-"

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
