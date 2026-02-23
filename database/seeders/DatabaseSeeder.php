<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash; // <--- PENTING: Untuk enkripsi password
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. BUAT AKUN ADMIN (Agar Anda bisa masuk ke Dashboard Admin)
        User::create([
            'name' => 'Admin Humania',
            'email' => 'admin@humania.com',
            'password' => Hash::make('admin123'), // Passwordnya: admin123
            'role' => 'admin', // Role Admin
        ]);

        // 2. BUAT AKUN KANDIDAT DUMMY (Untuk tes login user biasa)
        User::create([
            'name' => 'Kandidat Contoh',
            'email' => 'kandidat@gmail.com',
            'password' => Hash::make('password'), // Passwordnya: password
            'role' => 'kandidat', // Role Kandidat
        ]);
    }
}
