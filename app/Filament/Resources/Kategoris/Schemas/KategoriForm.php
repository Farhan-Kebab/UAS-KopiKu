<?php

namespace App\Filament\Resources\Kategoris\Schemas;

use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Group;
use Filament\Forms\Components\TextInput;

class KategoriForm
{
    public static function schema(): array
    {
        return [
            Section::make()->schema([
                TextInput::make('nama_kategori')
                    ->label('Nama Kategori')
                    ->required()
                    ->placeholder('Contoh: Espresso Based, Non-Coffee')
                    ->unique(ignoreRecord: true),
            ])
        ];
    }
}