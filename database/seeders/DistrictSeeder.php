<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\District;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $districts = [
            [
                'id' => 1,
                'name' => 'Balige',
                'district_head' => 'Dr. John Sitorus',
                'bupati_name' => 'Effendi Simbolon Panangian Napitupulu',
                'wakil_bupati_name' => 'Audi Murphy Sitorus',
                'periode' => '2024-2025',
                'address' => 'Jl. Sisingamangaraja No. 1, Balige',
                'phone' => '0632-21001',
                'email' => 'balige@tobakab.go.id',
                'description' => 'Kecamatan Balige merupakan ibu kota Kabupaten Toba',
                'visi' => 'Toba Unggul dan Bersinar',
                'misi' => 'Meningkatkan kualitas sumber daya manusia yang andal dan berbudaya, mempercepat pembangunan infrastruktur, serta mewujudkan reformasi birokrasi yang bersih dan melayani.',
                'documentation_file' => 'districts/documentation/dokumentasi_kegiatan_1764587703.pdf',
            ],
            [
                'id' => 2,
                'name' => 'Laguboti',
                'district_head' => 'Ir. Maria Simanjuntak',
                'address' => 'Jl. Raya Laguboti',
                'phone' => '0632-21002',
                'email' => 'laguboti@tobakab.go.id',
            ],
            [
                'id' => 3,
                'name' => 'Habinsaran',
                'district_head' => 'H. Parulian Tampubolon',
                'address' => 'Jl. Raya Habinsaran',
                'phone' => '0632-21003',
                'email' => 'habinsaran@tobakab.go.id',
            ],
            [
                'id' => 4,
                'name' => 'Borbor',
                'district_head' => 'Drs. Jonatan Siahaan',
                'address' => 'Jl. Raya Borbor',
                'phone' => '0632-21004',
                'email' => 'borbor@tobakab.go.id',
            ],
            [
                'id' => 5,
                'name' => 'Nassau',
                'district_head' => 'Ir. Mangihut Nainggolan',
                'address' => 'Jl. Raya Nassau',
                'phone' => '0632-21005',
                'email' => 'nassau@tobakab.go.id',
            ],
            [
                'id' => 6,
                'name' => 'Silaen',
                'district_head' => 'S.Pd. Hotman Simbolon',
                'address' => 'Jl. Raya Silaen',
                'phone' => '0632-21006',
                'email' => 'silaen@tobakab.go.id',
            ],
            [
                'id' => 7,
                'name' => 'Sigumpar',
                'district_head' => 'M.Si. Robert Sitanggang',
                'address' => 'Jl. Raya Sigumpar',
                'phone' => '0632-21007',
                'email' => 'sigumpar@tobakab.go.id',
            ],
            [
                'id' => 8,
                'name' => 'Parmaksian',
                'district_head' => 'Dra. Tiurma Hutabarat',
                'address' => 'Jl. Raya Parmaksian',
                'phone' => '0632-21008',
                'email' => 'parmaksian@tobakab.go.id',
            ],
            [
                'id' => 9,
                'name' => 'Pintu Pohan Meranti',
                'district_head' => 'S.H. Daniel Manurung',
                'address' => 'Jl. Raya Pintu Pohan',
                'phone' => '0632-21009',
                'email' => 'pintupohan@tobakab.go.id',
            ],
            [
                'id' => 10,
                'name' => 'Lumban Julu',
                'district_head' => 'Ir. Samuel Siburian',
                'address' => 'Jl. Raya Lumban Julu',
                'phone' => '0632-21010',
                'email' => 'lumbanjulu@tobakab.go.id',
            ],
            [
                'id' => 11,
                'name' => 'Uluan',
                'district_head' => 'M.Si. Elisa Hutapea',
                'address' => 'Jl. Raya Uluan',
                'phone' => '0632-21011',
                'email' => 'uluan@tobakab.go.id',
            ],
            [
                'id' => 12,
                'name' => 'Ajibata',
                'district_head' => 'Drs. Tommy Sihombing',
                'address' => 'Jl. Raya Ajibata',
                'phone' => '0632-21012',
                'email' => 'ajibata@tobakab.go.id',
            ],
            [
                'id' => 13,
                'name' => 'Bonatua Lunasi',
                'district_head' => 'S.T. Maruli Pangaribuan',
                'address' => 'Jl. Raya Bonatua',
                'phone' => '0632-21013',
                'email' => 'bonatua@tobakab.go.id',
            ],
            [
                'id' => 14,
                'name' => 'Siantar Narumonda',
                'district_head' => 'M.M. Hendra Sitompul',
                'address' => 'Jl. Raya Narumonda',
                'phone' => '0632-21014',
                'email' => 'narumonda@tobakab.go.id',
            ],
            [
                'id' => 15,
                'name' => 'Tampahan',
                'district_head' => 'S.Pd. Ruth Simarmata',
                'address' => 'Jl. Raya Tampahan',
                'phone' => '0632-21015',
                'email' => 'tampahan@tobakab.go.id',
            ],
            [
                'id' => 16,
                'name' => 'Porsea',
                'district_head' => 'Dr. Juntak Sinaga',
                'address' => 'Jl. Raya Porsea',
                'phone' => '0632-21016',
                'email' => 'porsea@tobakab.go.id',
                'description' => 'Kecamatan Porsea terletak di sisi utara Danau Toba',
            ],
        ];

        foreach ($districts as $data) {
            District::updateOrCreate(['id' => $data['id']], $data);
        }
    }
}
