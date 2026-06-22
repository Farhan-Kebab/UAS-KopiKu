<?php

namespace App\Filament\Resources\Menus\Schemas;

use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Group;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;

class MenuForm
{
    public static function schema(): array
    {
        return [
            Section::make()->schema([
                Select::make('kategori_id')
                    ->label('Kategori Menu')
                    ->relationship('kategori', 'nama_kategori')
                    ->preload()
                    ->searchable()
                    ->required(),

                TextInput::make('nama_menu')
                    ->label('Nama Menu / Kopi')
                    ->required(),

                TextInput::make('harga')
                    ->label('Harga Jual')
                    ->numeric()
                    ->prefix('Rp')
                    ->required(),

                Textarea::make('deskripsi')
                    ->label('Deskripsi Menu')
                    ->rows(3),

                FileUpload::make('foto_menu')
                    ->label('Foto Produk')
                    ->image()
                    ->directory('foto-menu')
                    ->imageEditor(),
            ])->columns(2)
        ];
    }
}