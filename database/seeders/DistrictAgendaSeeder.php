<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DistrictAgenda;

class DistrictAgendaSeeder extends Seeder
{
    public function run(): void
    {
        $agendas = [
            [
                'id' => 1,
                'district_id' => 1,
                'title' => 'Rapat Koordinasi Kecamatan',
                'description' => 'Rapat koordinasi bulanan dengan seluruh kepala desa',
                'event_date' => '2025-12-10',
                'time_start' => '09:00:00',
                'time_end' => '12:00:00',
                'location' => 'Aula Kantor Camat Balige',
                'category' => 'Rapat',
                'display_type' => 'berita',
                'status' => 'mendatang',
                'participants' => 'Kepala Desa se-Kecamatan Balige',
                'created_by' => 1,
            ],
            [
                'id' => 2,
                'district_id' => 1,
                'title' => 'Musrenbang Kecamatan',
                'description' => 'Musyawarah Perencanaan Pembangunan tingkat Kecamatan',
                'event_date' => '2025-12-15',
                'time_start' => '08:30:00',
                'time_end' => '16:00:00',
                'location' => 'Gedung Serbaguna Balige',
                'category' => 'Musyawarah',
                'display_type' => 'berita',
                'status' => 'mendatang',
                'participants' => 'Tokoh Masyarakat, Perangkat Desa, Dinas Terkait',
                'created_by' => 1,
            ],
        ];

        foreach ($agendas as $data) {
            DistrictAgenda::updateOrCreate(['id' => $data['id']], $data);
        }
    }
}