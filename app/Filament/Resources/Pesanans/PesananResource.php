<?php

namespace App\Filament\Resources\Pesanans;

use App\Filament\Resources\Pesanans\Pages\CreatePesanan;
use App\Filament\Resources\Pesanans\Pages\EditPesanan;
use App\Filament\Resources\Pesanans\Pages\ListPesanans;
use App\Filament\Resources\Pesanans\Schemas\PesananForm;
use App\Filament\Resources\Pesanans\Tables\PesanansTable;
use App\Models\Pesanan;
use BackedEnum;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Tables\Table;

class PesananResource extends Resource
{
    protected static ?string $model = Pesanan::class;

    protected static ?string $recordTitleAttribute = 'nomor_nota';

    public static function form(Schema $schema): Schema
    {
        return $schema->schema(PesananForm::schema());
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns(PesanansTable::columns())
            ->filters([])
            ->actions([
                \Filament\Actions\EditAction::make(),
            ])
            ->bulkActions([
                \Filament\Actions\BulkActionGroup::make([
                    \Filament\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPesanans::route('/'),
            'create' => CreatePesanan::route('/create'),
            'edit' => EditPesanan::route('/{record}/edit'),
        ];
    }

    public static function canViewAny(): bool
    {
        // Admin dan Kasir sama-sama bisa melihat menu Transaksi Pesanan
        return auth()->user()->hasAnyRole(['Admin', 'Kasir']);
    }
}