<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Village;
use App\Models\District;

class VillageSeeder extends Seeder
{
    public function run(): void
    {
        // Update: Seed only 6 main villages in correct order and details
        $district = District::first(); // Ambil satu kecamatan saja untuk contoh
        if ($district) {
            $villages = [
                ['name' => 'Meat', 'village_head' => 'Bapak Hotman Panjaitan', 'phone' => '0632-22009', 'email' => 'meat@tobakab.go.id', 'population' => 900, 'area' => 15.2],
                ['name' => 'Aek Bolon Julu', 'village_head' => 'Bapak Timbul Hutapea', 'phone' => '0632-23008', 'email' => 'aekbolonjulu@tobakab.go.id', 'population' => 258, 'area' => 9.7],
                ['name' => 'Pangombusan', 'village_head' => 'Bapak Samuel Manurung', 'phone' => '0632-24004', 'email' => 'pangombusan@tobakab.go.id', 'population' => 3354, 'area' => 25.1],
                ['name' => 'Pareparean', 'village_head' => 'Ibu Rosita Siahaan', 'phone' => '0632-22010', 'email' => 'pareparean@tobakab.go.id', 'population' => 900, 'area' => 15.2],
                ['name' => 'Pintu Bosi', 'village_head' => 'Ibu Martha Sitanggang', 'phone' => '0632-23009', 'email' => 'pintubosi@tobakab.go.id', 'population' => 258, 'area' => 9.7],
                ['name' => 'Sigumpar Toba', 'village_head' => 'Ibu Diana Simanjuntak', 'phone' => '0632-24005', 'email' => 'sigumpartoba@tobakab.go.id', 'population' => 3354, 'area' => 25.1],
            ];
            foreach ($villages as $village) {
                Village::create(array_merge($village, [
                    'district_id' => $district->id,
                    'address' => 'Kabupaten Toba',
                    'description' => null,
                ]));
            }
        }
    }
}