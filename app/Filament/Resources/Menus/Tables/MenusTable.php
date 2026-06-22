<?php

namespace App\Filament\Resources\Menus\Tables;

use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;

class MenusTable
{
    public static function columns(): array
    {
        return [
            ImageColumn::make('foto_menu')
                ->label('Foto')
                ->circular(),
            TextColumn::make('nama_menu')
                ->label('Nama Menu')
                ->searchable()
                ->sortable(),
            TextColumn::make('kategori.nama_kategori')
                ->label('Kategori'),
            TextColumn::make('harga')
                ->label('Harga')
                ->money('IDR', true)
                ->sortable(),
        ];
    }
}