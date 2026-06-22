<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,       // Pastikan UserSeeder (Kasir/Admin) dipanggil duluan
            KategoriSeeder::class,   // Menghasilkan Kategori kopi
            MenuSeeder::class,       // Menghasilkan daftar Produk/Menu kopi
            PesananSeeder::class,    // Menghasilkan Transaksi & Detail item belanja
        ]);
    }
}