<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori; // Pastikan Model Kategori di-import

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        // Menginput banyak data kategori sekaligus
        Kategori::insert([
            ['nama_kategori' => 'Espresso Based', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kategori' => 'Manual Brew', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kategori' => 'Non-Coffee', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kategori' => 'Snack & Pastry', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}