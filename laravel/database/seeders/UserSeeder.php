<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // User Guru1
        User::create([
            'username' => 'Guru1',
            'password' => Hash::make('Guru123'),
            'role'     => 'guru',
        ]);

        // User Admin (opsional, untuk testing)
        User::create([
            'username' => 'Admin1',
            'password' => Hash::make('Admin123'),
            'role'     => 'admin',
        ]);
    }
}
