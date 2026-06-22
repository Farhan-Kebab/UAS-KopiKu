<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PesananSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat Data Induk Pesanan (Struk/Nota)
        DB::table('pesanans')->insert([
            [
                'id' => 1,
                'user_id' => 1, // ID Kasir (mengacu pada user admin id 1)
                'nomor_nota' => 'COFFEE-20260621-001',
                'nama_pelanggan' => 'Kak Budi',
                'metode_pembayaran' => 'QRIS',
                'total_harga' => 48000, // Total dari 1 Kopi Susu (22rb) + 1 Matcha (26rb)
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 2,
                'user_id' => 1,
                'nomor_nota' => 'COFFEE-20260621-002',
                'nama_pelanggan' => 'Kak Citra',
                'metode_pembayaran' => 'Tunai',
                'total_harga' => 50000, // Total dari 2 Cafe Latte (2 x 25rb)
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

        // 2. Buat Data Detail Pesanan (Item apa saja yang dibeli di dalam struk tersebut)
        DB::table('detail_pesanans')->insert([
            // Item untuk Struk ID 1 (Pelanggan: Budi)
            [
                'pesanan_id' => 1,
                'menu_id' => 1, // Es Kopi Susu Gula Aren
                'jumlah' => 1,
                'subtotal' => 22000,
                'status_pembuatan' => 'Selesai',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'pesanan_id' => 1,
                'menu_id' => 4, // Matcha Latte Ice
                'jumlah' => 1,
                'subtotal' => 26000,
                'status_pembuatan' => 'Selesai',
                'created_at' => now(),
                'updated_at' => now()
            ],

            // Item untuk Struk ID 2 (Pelanggan: Citra)
            [
                'pesanan_id' => 2,
                'menu_id' => 2, // Cafe Latte Hot
                'jumlah' => 2, // Beli 2 cup
                'subtotal' => 50000,
                'status_pembuatan' => 'Diproses', // Masih dibuat oleh Barista
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}