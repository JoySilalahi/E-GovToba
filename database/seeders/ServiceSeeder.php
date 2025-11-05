<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'name' => 'Kartu Tanda Penduduk (KTP)',
                'description' => 'Pembuatan dan perpanjangan KTP elektronik.',
                'level' => 'district',
                'requirements' => json_encode([
                    'Kartu Keluarga',
                    'Pas foto 3x4 (2 lembar)',
                    'KTP lama (untuk perpanjangan)',
                ]),
                'processing_time' => 3,
                'fee' => 0,
                'is_active' => true,
            ],
            [
                'name' => 'Kartu Keluarga (KK)',
                'description' => 'Pembuatan dan perubahan data Kartu Keluarga.',
                'level' => 'district',
                'requirements' => json_encode([
                    'Surat pengantar RT/RW',
                    'KTP asli',
                    'Akta kelahiran/perkawinan',
                ]),
                'processing_time' => 5,
                'fee' => 0,
                'is_active' => true,
            ],
            [
                'name' => 'Surat Keterangan Usaha',
                'description' => 'Penerbitan surat keterangan usaha untuk UMKM.',
                'level' => 'village',
                'requirements' => json_encode([
                    'KTP',
                    'Kartu Keluarga',
                    'Pas foto 3x4 (2 lembar)',
                    'Surat pengantar RT/RW',
                ]),
                'processing_time' => 2,
                'fee' => 50000,
                'is_active' => true,
            ],
            [
                'name' => 'Akta Kelahiran',
                'description' => 'Pembuatan akta kelahiran baru.',
                'level' => 'district',
                'requirements' => json_encode([
                    'Surat keterangan lahir dari bidan/rumah sakit',
                    'KTP orang tua',
                    'Kartu Keluarga',
                    'Buku nikah/akta perkawinan orang tua',
                ]),
                'processing_time' => 7,
                'fee' => 0,
                'is_active' => true,
            ],
            [
                'name' => 'Surat Keterangan Tidak Mampu',
                'description' => 'Penerbitan surat keterangan tidak mampu untuk keperluan bantuan sosial.',
                'level' => 'village',
                'requirements' => json_encode([
                    'KTP',
                    'Kartu Keluarga',
                    'Surat pengantar RT/RW',
                ]),
                'processing_time' => 1,
                'fee' => 0,
                'is_active' => true,
            ],
            [
                'name' => 'Surat Izin Usaha Mikro Kecil (IUMK)',
                'description' => 'Penerbitan izin usaha untuk usaha mikro dan kecil.',
                'level' => 'district',
                'requirements' => json_encode([
                    'KTP',
                    'Kartu Keluarga',
                    'NPWP',
                    'Surat Keterangan Domisili Usaha',
                    'Pas foto 3x4 (2 lembar)',
                ]),
                'processing_time' => 14,
                'fee' => 100000,
                'is_active' => true,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}