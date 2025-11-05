<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin account
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@tobakab.go.id',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        // Staff account
        User::create([
            'name' => 'Staff Layanan',
            'email' => 'staff@tobakab.go.id',
            'password' => Hash::make('staff123'),
            'role' => 'staff',
        ]);
    }
}