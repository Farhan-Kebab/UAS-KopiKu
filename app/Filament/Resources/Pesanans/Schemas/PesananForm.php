<?php

namespace App\Filament\Resources\Pesanans\Schemas;

use App\Models\Menu;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Group;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Repeater;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;

class PesananForm
{
    public static function schema(): array
    {
        return [
            Group::make()->schema([
                Section::make()->schema([
                    TextInput::make('nomor_nota')
                        ->default('COFFEE-' . date('YmdHis'))
                        ->disabled()
                        ->required()
                        ->dehydrated(),

                    TextInput::make('nama_pelanggan')
                        ->label('Nama Pelanggan')
                        ->required(),

                    Select::make('metode_pembayaran')
                        ->options([
                            'Tunai' => 'Tunai / Cash',
                            'QRIS' => 'QRIS / Digital',
                            'Transfer' => 'Transfer Bank'
                        ])
                        ->required(),

                    Hidden::make('user_id')
                        ->default(auth()->id()),
                ])->columns(3),

                Section::make('Daftar Belanja Kopi')->schema([
                    Repeater::make('menus')
                        ->relationship('menus')
                        ->schema([
                            Select::make('menu_id')
                                ->label('Pilih Menu')
                                ->options(Menu::query()->pluck('nama_menu', 'id'))
                                ->required()
                                ->live()
                                ->afterStateUpdated(fn (Set $set, ?string $state) => $set('subtotal', Menu::find($state)?->harga ?? 0)),

                            TextInput::make('jumlah')
                                ->label('Qty')
                                ->numeric()
                                ->default(1)
                                ->required()
                                ->live(onBlur: true)
                                ->afterStateUpdated(function (Get $get, Set $set) {
                                    $menuId = $get('menu_id');
                                    $harga = Menu::find($menuId)?->harga ?? 0;
                                    $jumlah = $get('jumlah') ?? 1;
                                    $set('subtotal', $jumlah * $harga);
                                }),

                            TextInput::make('subtotal')
                                ->numeric()
                                ->prefix('Rp')
                                ->disabled()
                                ->dehydrated(),

                            Select::make('status_pembuatan')
                                ->options([
                                    'Diproses' => 'Diproses Barista',
                                    'Selesai' => 'Selesai',
                                    'Disajikan' => 'Disajikan'
                                ])->default('Diproses')
                        ])
                        ->columns(4)
                        ->createItemButtonLabel('Tambah Item')
                ])
            ])->columnSpanFull()
        ];
    }
}