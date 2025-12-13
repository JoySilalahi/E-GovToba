<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Village;
use App\Models\District;

class VillageSeeder extends Seeder
{
    public function run(): void
    {
        $villages = [
            [
                'id' => 1,
                'district_id' => 1, // Balige
                'name' => 'Meat',
                'village_head' => 'Bapak Hotman Panjaitan',
                'address' => 'Kabupaten Toba',
                'phone' => '0632-22009',
                'email' => 'meat@tobakab.go.id',
                'visi' => 'terimakasih hapus haha',
                'misi' => 'Sama Sama',
                'budget_file' => 'villages/budgets/anggaran_desa_Meat_1764663330.pdf',
                'population' => 900,
                'area' => 15.20,
            ],
            [
                'id' => 2,
                'district_id' => 1, // Balige
                'name' => 'Aek Bolon Julu',
                'village_head' => 'Bapak Timbul Hutapea',
                'address' => 'Kabupaten Toba',
                'phone' => '0632-23008',
                'email' => 'aekbolonjulu@tobakab.go.id',
                'population' => 258,
                'area' => 9.70,
            ],
            [
                'id' => 3,
                'district_id' => 1, // Balige
                'name' => 'Pangombusan',
                'village_head' => 'Bapak Samuel Manurung',
                'address' => 'Kabupaten Toba',
                'phone' => '0632-24004',
                'email' => 'pangombusan@tobakab.go.id',
                'population' => 3354,
                'area' => 25.10,
            ],
            [
                'id' => 4,
                'district_id' => 1, // Balige
                'name' => 'Pareparean',
                'village_head' => 'Ibu Rosita Siahaan',
                'address' => 'Kabupaten Toba',
                'phone' => '0632-22010',
                'email' => 'pareparean@tobakab.go.id',
                'population' => 900,
                'area' => 15.20,
            ],
            [
                'id' => 5,
                'district_id' => 1, // Balige
                'name' => 'Pintu Bosi',
                'village_head' => 'Ibu Martha Sitanggang',
                'address' => 'Kabupaten Toba',
                'phone' => '0632-23009',
                'email' => 'pintubosi@tobakab.go.id',
                'population' => 258,
                'area' => 9.70,
            ],
            [
                'id' => 6,
                'district_id' => 1, // Balige
                'name' => 'Sigumpar Toba',
                'village_head' => 'Ibu Diana Simanjuntak',
                'address' => 'Kabupaten Toba',
                'phone' => '0632-24005',
                'email' => 'sigumpartoba@tobakab.go.id',
                'population' => 3354,
                'area' => 25.10,
            ],
        ];

        foreach ($villages as $data) {
            Village::updateOrCreate(['id' => $data['id']], $data);
        }
    }
}