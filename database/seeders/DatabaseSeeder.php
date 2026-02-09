<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Pilgrim;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Buat 1 Akun Admin Tetap (Agar kita tahu loginnya apa)
        // Kita gunakan firstOrCreate agar tidak error jika di-seed ulang
        User::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );

        // 2. Buat 50 Data Dummy Jamaah Haji
        // Menggunakan Factory yang sudah kita buat sebelumnya
        Pilgrim::factory(50)->create();

        // Output info di terminal
        $this->command->info('Admin user created: admin@gmail.com / password');
        $this->command->info('50 Dummy Pilgrims created.');
    }
}
