<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'id' => 1,
                'name' => 'Administrator',
                'email' => 'admin@tobakab.go.id',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
                'village_id' => null,
            ],
            [
                'id' => 2,
                'name' => 'Staff Layanan',
                'email' => 'staff@tobakab.go.id',
                'password' => Hash::make('staff123'),
                'role' => 'staff',
                'village_id' => null,
            ],
            [
                'id' => 3,
                'name' => 'Admin Meat',
                'email' => 'meat@village.admin',
                'password' => Hash::make('password'),
                'role' => 'village_admin',
                'village_id' => 1,
            ],
            [
                'id' => 4,
                'name' => 'Admin Aek Bolon Julu',
                'email' => 'aekbolonjulu@village.admin',
                'password' => Hash::make('password'),
                'role' => 'village_admin',
                'village_id' => 2,
            ],
            [
                'id' => 5,
                'name' => 'Admin Pangombusan',
                'email' => 'pangombusan@village.admin',
                'password' => Hash::make('password'),
                'role' => 'village_admin',
                'village_id' => 3,
            ],
            [
                'id' => 6,
                'name' => 'Admin Pareparean',
                'email' => 'pareparean@village.admin',
                'password' => Hash::make('password'),
                'role' => 'village_admin',
                'village_id' => 4,
            ],
            [
                'id' => 7,
                'name' => 'Admin Pintu Bosi',
                'email' => 'pintubosi@village.admin',
                'password' => Hash::make('password'),
                'role' => 'village_admin',
                'village_id' => 5,
            ],
            [
                'id' => 8,
                'name' => 'Admin Sigumpar Toba',
                'email' => 'sigumpartoba@village.admin',
                'password' => Hash::make('password'),
                'role' => 'village_admin',
                'village_id' => 6,
            ],
        ];

        foreach ($users as $data) {
            User::updateOrCreate(['id' => $data['id']], $data);
        }
    }
}