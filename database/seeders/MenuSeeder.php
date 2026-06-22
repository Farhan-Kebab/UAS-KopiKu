<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu; // Pastikan Model Menu di-import

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        Menu::insert([
            [
                'kategori_id' => 1, // Espresso Based
                'nama_menu' => 'Es Kopi Susu Gula Aren',
                'harga' => 22000,
                'deskripsi' => 'Espresso blend premium dikombinasikan dengan susu segar dan sirup gula aren murni.',
                'foto_menu' => null,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'kategori_id' => 1, // Espresso Based
                'nama_menu' => 'Cafe Latte Hot',
                'harga' => 25000,
                'deskripsi' => 'Double shot espresso dengan susu uap hangat dan foam tipis di atasnya.',
                'foto_menu' => null,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'kategori_id' => 2, // Manual Brew
                'nama_menu' => 'V60 Gayo Aceh',
                'harga' => 28000,
                'deskripsi' => 'Kopi seduh manual menggunakan beans arabika Gayo dengan metode V60.',
                'foto_menu' => null,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'kategori_id' => 3, // Non-Coffee
                'nama_menu' => 'Matcha Latte Ice',
                'harga' => 26000,
                'deskripsi' => 'Pure Japanese Matcha dengan racikan creamy milk khas kedai.',
                'foto_menu' => null,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}