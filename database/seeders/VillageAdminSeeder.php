<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Village;
use Illuminate\Support\Facades\Hash;

class VillageAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil semua desa
        $villages = Village::all();

        foreach ($villages as $village) {
            // Buat username dari nama desa (lowercase, hapus spasi)
            $username = strtolower(str_replace(' ', '', $village->name));
            
            // Cek apakah user sudah ada
            $existingUser = User::where('email', $username . '@village.admin')->first();
            
            if (!$existingUser) {
                User::create([
                    'name' => 'Admin ' . $village->name,
                    'email' => $username . '@village.admin',
                    'password' => Hash::make('password123'), // Password default
                    'role' => 'village_admin',
                    'village_id' => $village->id,
                ]);
            }
        }

        // Tampilkan info akun yang dibuat
        echo "\n=== AKUN ADMIN DESA ===\n";
        $villageAdmins = User::where('role', 'village_admin')->with('village')->get();
        foreach ($villageAdmins as $admin) {
            echo "Desa: {$admin->village->name}\n";
            echo "Email: {$admin->email}\n";
            echo "Password: password123\n";
            echo "---\n";
        }
    }
}
