<?php

namespace App\Filament\Resources\Kategoris\Tables;

use Filament\Tables\Columns\TextColumn;

class KategorisTable
{
    public static function columns(): array
    {
        return [
            TextColumn::make('nama_kategori')
                ->label('Nama Kategori')
                ->searchable()
                ->sortable(),
            TextColumn::make('created_at')
                ->label('Dibuat Pada')
                ->dateTime('d M Y H:i'),
        ];
    }
}