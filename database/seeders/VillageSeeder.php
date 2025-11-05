<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Village;
use App\Models\District;

class VillageSeeder extends Seeder
{
    public function run(): void
    {
        $balige = District::where('name', 'Balige')->first();
        if ($balige) {
            $villages = [
                ['name' => 'Balige I', 'village_head' => 'Bapak Saut Situmorang', 'phone' => '0632-22001', 'email' => 'balige1@tobakab.go.id', 'population' => 2500, 'area' => 3.5],
                ['name' => 'Balige II', 'village_head' => 'Ibu Marina Sinaga', 'phone' => '0632-22002', 'email' => 'balige2@tobakab.go.id', 'population' => 2800, 'area' => 4.2],
                ['name' => 'Soposurung', 'village_head' => 'Ibu Ruth Simanjuntak', 'phone' => '0632-22004', 'email' => 'soposurung@tobakab.go.id', 'population' => 3200, 'area' => 5.1],
                ['name' => 'Purbatua', 'village_head' => 'Bapak Darwin Situmorang', 'phone' => '0632-22005', 'email' => 'purbatua@tobakab.go.id', 'population' => 2100, 'area' => 3.8],
                ['name' => 'Pasar Balige', 'village_head' => 'Bapak Robert Sitanggang', 'phone' => '0632-22008', 'email' => 'pasarbalige@tobakab.go.id', 'population' => 4500, 'area' => 2.5],
            ];

            foreach ($villages as $village) {
                Village::create(array_merge($village, [
                    'district_id' => $balige->id,
                    'address' => 'Kecamatan Balige',
                    'description' => null,
                ]));
            }
        }

        $laguboti = District::where('name', 'Laguboti')->first();
        if ($laguboti) {
            $villages = [
                ['name' => 'Laguboti', 'village_head' => 'Bapak Sahala Siahaan', 'phone' => '0632-23001', 'email' => 'laguboti@tobakab.go.id', 'population' => 3500, 'area' => 4.5],
                ['name' => 'Sipinggan', 'village_head' => 'Bapak Juntak Manurung', 'phone' => '0632-23005', 'email' => 'sipinggan@tobakab.go.id', 'population' => 2200, 'area' => 6.2],
                ['name' => 'Pasar Laguboti', 'village_head' => 'Ibu Linda Pangaribuan', 'phone' => '0632-23007', 'email' => 'pasarlaguboti@tobakab.go.id', 'population' => 3800, 'area' => 3.1],
            ];

            foreach ($villages as $village) {
                Village::create(array_merge($village, [
                    'district_id' => $laguboti->id,
                    'address' => 'Kecamatan Laguboti',
                    'description' => null,
                ]));
            }
        }

        $porsea = District::where('name', 'Porsea')->first();
        if ($porsea) {
            $villages = [
                ['name' => 'Porsea', 'village_head' => 'Bapak Richard Sitorus', 'phone' => '0632-24001', 'email' => 'porsea@tobakab.go.id', 'population' => 4200, 'area' => 5.8],
                ['name' => 'Simanindo', 'village_head' => 'Ibu Anna Simanjuntak', 'phone' => '0632-24002', 'email' => 'simanindo@tobakab.go.id', 'population' => 2900, 'area' => 7.3],
                ['name' => 'Pangururan', 'village_head' => 'Bapak Marolop Nainggolan', 'phone' => '0632-24003', 'email' => 'pangururan@tobakab.go.id', 'population' => 3300, 'area' => 4.9],
            ];

            foreach ($villages as $village) {
                Village::create(array_merge($village, [
                    'district_id' => $porsea->id,
                    'address' => 'Kecamatan Porsea',
                    'description' => null,
                ]));
            }
        }
    }
}