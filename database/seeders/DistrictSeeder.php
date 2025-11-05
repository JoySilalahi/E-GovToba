<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\District;

class DistrictSeeder extends Seeder
{
    public function run(): void
    {
        $districts = [
            ['name' => 'Balige', 'district_head' => 'Dr. John Sitorus', 'phone' => '0632-21001', 'email' => 'balige@tobakab.go.id', 'address' => 'Jl. Sisingamangaraja No. 1, Balige', 'description' => 'Kecamatan Balige merupakan ibu kota Kabupaten Toba'],
            ['name' => 'Laguboti', 'district_head' => 'Ir. Maria Simanjuntak', 'phone' => '0632-21002', 'email' => 'laguboti@tobakab.go.id', 'address' => 'Jl. Raya Laguboti', 'description' => null],
            ['name' => 'Habinsaran', 'district_head' => 'H. Parulian Tampubolon', 'phone' => '0632-21003', 'email' => 'habinsaran@tobakab.go.id', 'address' => 'Jl. Raya Habinsaran', 'description' => null],
            ['name' => 'Borbor', 'district_head' => 'Drs. Jonatan Siahaan', 'phone' => '0632-21004', 'email' => 'borbor@tobakab.go.id', 'address' => 'Jl. Raya Borbor', 'description' => null],
            ['name' => 'Nassau', 'district_head' => 'Ir. Mangihut Nainggolan', 'phone' => '0632-21005', 'email' => 'nassau@tobakab.go.id', 'address' => 'Jl. Raya Nassau', 'description' => null],
            ['name' => 'Silaen', 'district_head' => 'S.Pd. Hotman Simbolon', 'phone' => '0632-21006', 'email' => 'silaen@tobakab.go.id', 'address' => 'Jl. Raya Silaen', 'description' => null],
            ['name' => 'Sigumpar', 'district_head' => 'M.Si. Robert Sitanggang', 'phone' => '0632-21007', 'email' => 'sigumpar@tobakab.go.id', 'address' => 'Jl. Raya Sigumpar', 'description' => null],
            ['name' => 'Parmaksian', 'district_head' => 'Dra. Tiurma Hutabarat', 'phone' => '0632-21008', 'email' => 'parmaksian@tobakab.go.id', 'address' => 'Jl. Raya Parmaksian', 'description' => null],
            ['name' => 'Pintu Pohan Meranti', 'district_head' => 'S.H. Daniel Manurung', 'phone' => '0632-21009', 'email' => 'pintupohan@tobakab.go.id', 'address' => 'Jl. Raya Pintu Pohan', 'description' => null],
            ['name' => 'Lumban Julu', 'district_head' => 'Ir. Samuel Siburian', 'phone' => '0632-21010', 'email' => 'lumbanjulu@tobakab.go.id', 'address' => 'Jl. Raya Lumban Julu', 'description' => null],
            ['name' => 'Uluan', 'district_head' => 'M.Si. Elisa Hutapea', 'phone' => '0632-21011', 'email' => 'uluan@tobakab.go.id', 'address' => 'Jl. Raya Uluan', 'description' => null],
            ['name' => 'Ajibata', 'district_head' => 'Drs. Tommy Sihombing', 'phone' => '0632-21012', 'email' => 'ajibata@tobakab.go.id', 'address' => 'Jl. Raya Ajibata', 'description' => null],
            ['name' => 'Bonatua Lunasi', 'district_head' => 'S.T. Maruli Pangaribuan', 'phone' => '0632-21013', 'email' => 'bonatua@tobakab.go.id', 'address' => 'Jl. Raya Bonatua', 'description' => null],
            ['name' => 'Siantar Narumonda', 'district_head' => 'M.M. Hendra Sitompul', 'phone' => '0632-21014', 'email' => 'narumonda@tobakab.go.id', 'address' => 'Jl. Raya Narumonda', 'description' => null],
            ['name' => 'Tampahan', 'district_head' => 'S.Pd. Ruth Simarmata', 'phone' => '0632-21015', 'email' => 'tampahan@tobakab.go.id', 'address' => 'Jl. Raya Tampahan', 'description' => null],
            ['name' => 'Porsea', 'district_head' => 'Dr. Juntak Sinaga', 'phone' => '0632-21016', 'email' => 'porsea@tobakab.go.id', 'address' => 'Jl. Raya Porsea', 'description' => 'Kecamatan Porsea terletak di sisi utara Danau Toba'],
        ];

        foreach ($districts as $district) {
            District::create($district);
        }
    }
}