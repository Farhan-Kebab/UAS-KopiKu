<?php

namespace App\Filament\Resources\Users;

use App\Filament\Resources\Users\Pages\CreateUser;
use App\Filament\Resources\Users\Pages\EditUser;
use App\Filament\Resources\Users\Pages\ListUsers;
use App\Filament\Resources\Users\Schemas\UserForm;
use App\Filament\Resources\Users\Tables\UsersTable;
use App\Models\User;
use BackedEnum;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;

class UserResource extends Resource
{
    protected static ?string $model = User::class;



    public static function form(Schema $schema): Schema
    {
        return $schema->schema(UserForm::schema());
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns(UsersTable::columns())
            ->actions([
                \Filament\Actions\EditAction::make(),
            ])
            ->bulkActions([
                \Filament\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListUsers::route('/'),
            'create' => CreateUser::route('/create'),
            'edit' => EditUser::route('/{record}/edit'),
        ];
    }

    public static function canViewAny(): bool
    {
        return Auth::user()?->hasRole('Admin');
    }

    public static function canCreate(): bool
    {
        return Auth::user()?->hasRole('Admin');
    }

    public static function canEdit($record): bool
    {
        return Auth::user()?->hasRole('Admin');
    }

    public static function canDelete($record): bool
    {
        return Auth::user()?->hasRole('Admin');
    }

    public static function canDeleteAny(): bool
    {
        return Auth::user()?->hasRole('Admin');
    }
}