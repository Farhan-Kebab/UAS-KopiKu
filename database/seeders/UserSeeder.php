<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder 
{
    public function run(): void
    {
        // 1. Membuat Permissions (Hak Akses)
        Permission::create(['name' => 'kelola_kategori']);
        Permission::create(['name' => 'kelola_menu']);
        Permission::create(['name' => 'kelola_pesanan']);

        // 2. Membuat Roles
        $adminRole = Role::create(['name' => 'Admin']);
        $kasirRole = Role::create(['name' => 'Kasir']);

        // 3. Memberikan Permission ke Role
        $adminRole->givePermissionTo(Permission::all()); // Admin memegang semua akses
        $kasirRole->givePermissionTo(['kelola_pesanan']); // Kasir hanya bisa transaksi

        // 4. Membuat 3 Akun Admin Utama Anda (Ditugaskan sebagai 'Admin')
        $admin1 = User::create([
            'name' => 'Admin Satu',
            'email' => 'admin1@gmail.com',
            'password' => Hash::make('password'),
        ]);
        $admin1->assignRole($adminRole);

        $admin2 = User::create([
            'name' => 'Admin Dua',
            'email' => 'admin2@gmail.com',
            'password' => Hash::make('password'),
        ]);
        $admin2->assignRole($adminRole);

        $admin3 = User::create([
            'name' => 'Admin Tiga',
            'email' => 'admin3@gmail.com',
            'password' => Hash::make('password'),
        ]);
        $admin3->assignRole($adminRole);

        // 5. Membuat Akun Kasir Khusus (Ditugaskan sebagai 'Kasir')
        // Email diubah menjadi 'kasir1@gmail.com' agar rapi sejalan dengan admin Anda
        $kasir = User::create([
            'name' => 'Kasir Utama',
            'email' => 'kasir1@gmail.com', 
            'password' => Hash::make('password'),
        ]);
        $kasir->assignRole($kasirRole);
    }
}