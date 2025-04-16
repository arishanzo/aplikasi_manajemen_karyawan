<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin User
        User::create([
            'name' => 'Sebastian Alex',
            'username' => 'manajemen',
            'email' => 'manajemen@example.com',
            'password' => Hash::make('manajemen'),
            'role' => 'manajemen',
        ]);

        // Regular User
        User::create([
            'name' => 'Hilman',
            'username' => 'user',
            'email' => 'user@example.com',
            'password' => Hash::make('user'),
            'role' => 'user',
        ]);
    }
}
