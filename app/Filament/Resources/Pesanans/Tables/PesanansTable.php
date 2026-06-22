<?php

namespace App\Filament\Resources\Pesanans\Tables;

use Filament\Tables\Columns\TextColumn;

class PesanansTable
{
    public static function columns(): array
    {
        return [
            TextColumn::make('nomor_nota')->searchable(),
            TextColumn::make('nama_pelanggan')->searchable(),
            TextColumn::make('metode_pembayaran'),
            TextColumn::make('user.name')->label('Kasir'),
            TextColumn::make('total_harga')
                ->label('Total Bayar')
                ->money('IDR', true),
            TextColumn::make('created_at')
                ->label('Waktu')
                ->dateTime('d M Y, H:i'),
        ];
    }
}