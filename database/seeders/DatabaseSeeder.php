<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@kos.com'],
            [
                'name' => 'Admin Mamikos',
                'password' => Hash::make('password123'),
                'role' => 'admin',
            ]
        );
    }
}