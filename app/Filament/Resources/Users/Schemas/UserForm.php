<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;

class UserForm
{
    public static function schema(): array
    {
        return [
            Section::make()->schema([
                TextInput::make('name')
                    ->label('Nama Pengguna')
                    ->required(),

                TextInput::make('email')
                    ->email()
                    ->required()
                    ->unique(ignoreRecord: true),

                TextInput::make('password')
                    ->password()
                    ->dehydrateStateUsing(fn ($state) => bcrypt($state))
                    ->dehydrated(fn ($state) => filled($state))
                    ->required(fn (string $context): bool => $context === 'create'),

                // Input untuk memilih Role (Relasi Spatie many-to-many otomatis lewat Filament)
                Select::make('roles')
                    ->label('Hak Akses / Role')
                    ->relationship('roles', 'name')
                    ->preload()
                    ->multiple() // User bisa memiliki lebih dari 1 role jika diperlukan
                    ->required(),
            ])->columns(2)
        ];
    }
}