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
            'name' => 'merchaint User',
            'username' => 'merchaint',
            'email' => 'merchaint@example.com',
            'password' => Hash::make('merchaint'),
            'role' => 'merchaint',
        ]);

        // Regular User
        User::create([
            'name' => 'company User',
            'username' => 'company',
            'email' => 'company@example.com',
            'password' => Hash::make('company'),
            'role' => 'company',
        ]);
    }
}
