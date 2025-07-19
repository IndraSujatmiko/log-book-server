<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin Log Book',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'), // ganti kalau perlu
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Petugas TI',
            'email' => 'petugas@example.com',
            'password' => Hash::make('password'),
            'role' => 'petugas',
        ]);

        User::create([
            'name' => 'Verifikator Keamanan',
            'email' => 'verifikator@example.com',
            'password' => Hash::make('password'),
            'role' => 'verifikator',
        ]);
    }
}
