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
        User::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );

        Pilgrim::factory(25)->create();

        $this->command->info('Admin user created: admin@gmail.com / password');
        $this->command->info('50 Dummy Pilgrims created.');
    }
}
