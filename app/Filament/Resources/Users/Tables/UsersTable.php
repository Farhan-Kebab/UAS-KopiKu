<?php

namespace App\Filament\Resources\Users\Tables;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;

class UsersTable
{
    public static function columns(): array
    {
        return [
            TextColumn::make('name')
                ->label('Nama')
                ->searchable(),
                
            TextColumn::make('email')
                ->searchable(),

            // Menampilkan badge daftar role yang dimiliki user
            TextColumn::make('roles.name')
                ->label('Role')
                ->badge()
                ->color(fn (string $state): string => match ($state) {
                    'Admin' => 'danger',
                    'Kasir' => 'success',
                    default => 'gray',
                }),
        ];
    }
}