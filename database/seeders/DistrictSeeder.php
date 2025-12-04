<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\District;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Cek apakah sudah ada data district
        if (District::count() > 0) {
            // Update data yang sudah ada
            $district = District::first();
            $district->update([
                'bupati_name' => $district->bupati_name ?? 'Effendi Simbolon Panangian Napitupulu',
                'wakil_bupati_name' => $district->wakil_bupati_name ?? 'Audi Murphy Sitorus',
                'periode' => $district->periode ?? '2024-2025',
                'visi' => $district->visi ?? 'Toba Unggul dan Bersinar',
                'misi' => $district->misi ?? 'Meningkatkan kualitas sumber daya manusia yang andal dan berbudaya, mempercepat pembangunan infrastruktur, serta mewujudkan reformasi birokrasi yang bersih dan melayani.',
            ]);
        } else {
            // Buat data baru
            District::create([
                'name' => 'Kabupaten Toba',
                'code' => 'KAB-TOBA',
                'head_of_district' => 'Effendi Simbolon Panangian Napitupulu',
                'phone' => '0632-123456',
                'address' => 'Jalan Raya Balige, Kabupaten Toba, Sumatera Utara',
                'visi' => 'Toba Unggul dan Bersinar',
                'misi' => 'Meningkatkan kualitas sumber daya manusia yang andal dan berbudaya, mempercepat pembangunan infrastruktur, serta mewujudkan reformasi birokrasi yang bersih dan melayani.',
                'bupati_name' => 'Effendi Simbolon Panangian Napitupulu',
                'wakil_bupati_name' => 'Audi Murphy Sitorus',
                'periode' => '2024-2025',
            ]);
        }
    }
}
