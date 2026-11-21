<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin Sahabat',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'role' => User::ROLE_ADMIN,
        ]);

        User::create([
            'name' => 'Perawat Sri',
            'email' => 'perawat@gmail.com',
            'password' => Hash::make('perawat123'),
            'role' => User::ROLE_PERAWAT,
        ]);

        User::create([
            'name' => 'Tn. Rudi',
            'email' => 'pasien@gmail.com',
            'password' => Hash::make('pasien123'),
            'role' => User::ROLE_PASIEN,
            'age' => 64,
        ]);
    }
}