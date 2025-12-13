<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'id' => 1,
                'name' => 'Kartu Tanda Penduduk (KTP)',
                'description' => 'Pembuatan dan perpanjangan KTP elektronik.',
                'level' => 'district',
                'requirements' => ["Kartu Keluarga", "Pas foto 3x4 (2 lembar)", "KTP lama (untuk perpanjangan)"],
                'processing_time' => 3,
                'fee' => 0.00,
                'is_active' => 1,
            ],
            [
                'id' => 2,
                'name' => 'Kartu Keluarga (KK)',
                'description' => 'Pembuatan dan perubahan data Kartu Keluarga.',
                'level' => 'district',
                'requirements' => ["Surat pengantar RT/RW", "KTP asli", "Akta kelahiran/perkawinan"],
                'processing_time' => 5,
                'fee' => 0.00,
                'is_active' => 1,
            ],
            [
                'id' => 3,
                'name' => 'Surat Keterangan Usaha',
                'description' => 'Penerbitan surat keterangan usaha untuk UMKM.',
                'level' => 'village',
                'requirements' => ["KTP", "Kartu Keluarga", "Pas foto 3x4 (2 lembar)", "Surat pengantar RT/RW"],
                'processing_time' => 2,
                'fee' => 50000.00,
                'is_active' => 1,
            ],
            [
                'id' => 4,
                'name' => 'Akta Kelahiran',
                'description' => 'Pembuatan akta kelahiran baru.',
                'level' => 'district',
                'requirements' => ["Surat keterangan lahir dari bidan/rumah sakit", "KTP orang tua", "Kartu Keluarga", "Buku nikah/akta perkawinan orang tua"],
                'processing_time' => 7,
                'fee' => 0.00,
                'is_active' => 1,
            ],
            [
                'id' => 5,
                'name' => 'Surat Keterangan Tidak Mampu',
                'description' => 'Penerbitan surat keterangan tidak mampu untuk keperluan bantuan sosial.',
                'level' => 'village',
                'requirements' => ["KTP", "Kartu Keluarga", "Surat pengantar RT/RW"],
                'processing_time' => 1,
                'fee' => 0.00,
                'is_active' => 1,
            ],
            [
                'id' => 6,
                'name' => 'Surat Izin Usaha Mikro Kecil (IUMK)',
                'description' => 'Penerbitan izin usaha untuk usaha mikro dan kecil.',
                'level' => 'district',
                'requirements' => ["KTP", "Kartu Keluarga", "NPWP", "Surat Keterangan Domisili Usaha", "Pas foto 3x4 (2 lembar)"],
                'processing_time' => 14,
                'fee' => 100000.00,
                'is_active' => 1,
            ],
        ];

        foreach ($services as $data) {
            Service::updateOrCreate(['id' => $data['id']], $data);
        }
    }
}