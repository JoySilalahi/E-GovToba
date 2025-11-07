<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Village;

class VillageVisiMisiSeeder extends Seeder
{
    public function run(): void
    {
        $visiMisiData = [
            'Meat' => [
                'visi' => 'Mewujudkan Desa Meat yang Mandiri, Sejahtera, dan Berbudaya dengan semangat gotong royong.',
                'misi' => 'Meningkatkan kualitas sumber daya manusia, mengoptimalkan potensi desa di bidang pertanian dan pariwisata, serta melestarikan adat dan budaya lokal.'
            ],
            'Aek Bolon Julu' => [
                'visi' => 'Menjadikan Desa Aek Bolon Julu sebagai desa wisata budaya yang lestari dan sejahtera.',
                'misi' => 'Melestarikan rumah adat dan tradisi Batak, mengembangkan ekonomi kreatif berbasis budaya, meningkatkan kesejahteraan masyarakat.'
            ],
            'Pangombusan' => [
                'visi' => 'Desa Pangombusan yang maju, mandiri, dan sejahtera berbasis pertanian.',
                'misi' => 'Meningkatkan produktivitas pertanian, mengembangkan infrastruktur desa, memberdayakan ekonomi masyarakat.'
            ],
            'Pararpuan' => [
                'visi' => 'Desa Pararpuan yang harmonis, religius, dan berbudaya.',
                'misi' => 'Melestarikan nilai-nilai kearifan lokal, meningkatkan kualitas kehidupan beragama, membangun kerukunan warga.'
            ],
            'Pintu Bosi' => [
                'visi' => 'Desa Pintu Bosi yang tertib administrasi dan pelayanan prima.',
                'misi' => 'Meningkatkan kualitas pelayanan publik, digitalisasi administrasi desa, transparansi pengelolaan desa.'
            ],
            'Sigumpar Toba' => [
                'visi' => 'Desa Sigumpar Toba yang sejuk, asri, dan berkelanjutan.',
                'misi' => 'Menjaga kelestarian lingkungan, mengembangkan ekowisata, meningkatkan kesejahteraan melalui pertanian organik.'
            ],
            'Balige I' => [
                'visi' => 'Mewujudkan Desa Balige I yang modern, sejahtera, dan berbudaya.',
                'misi' => 'Meningkatkan kualitas pelayanan publik, mengembangkan ekonomi kreatif, dan melestarikan budaya lokal.'
            ],
            'Balige II' => [
                'visi' => 'Desa Balige II yang maju dan sejahtera dengan tata kelola yang baik.',
                'misi' => 'Meningkatkan kesejahteraan masyarakat, mengembangkan potensi desa, dan memperkuat partisipasi warga.'
            ],
            'Soposurung' => [
                'visi' => 'Desa Soposurung yang religius, harmonis, dan sejahtera.',
                'misi' => 'Membangun kehidupan beragama yang kuat, mengembangkan ekonomi kerakyatan, dan melestarikan budaya.'
            ],
            'Purbatua' => [
                'visi' => 'Mewujudkan Desa Purbatua yang bersih, sehat, dan sejahtera.',
                'misi' => 'Meningkatkan kesehatan masyarakat, mengembangkan sanitasi lingkungan, dan memberdayakan ekonomi lokal.'
            ],
            'Pasar Balige' => [
                'visi' => 'Desa Pasar Balige sebagai pusat ekonomi dan perdagangan yang maju.',
                'misi' => 'Mengembangkan sektor perdagangan, meningkatkan infrastruktur pasar, dan memberdayakan pelaku UMKM.'
            ],
            'Laguboti' => [
                'visi' => 'Desa Laguboti yang maju, sejahtera, dan berkelanjutan.',
                'misi' => 'Meningkatkan kualitas hidup masyarakat, mengoptimalkan potensi ekonomi lokal, dan menjaga kelestarian lingkungan.'
            ],
            'Sipinggan' => [
                'visi' => 'Mewujudkan Desa Sipinggan yang aman, nyaman, dan sejahtera.',
                'misi' => 'Membangun keamanan dan ketertiban, mengembangkan infrastruktur desa, dan meningkatkan kesejahteraan warga.'
            ],
            'Pasar Laguboti' => [
                'visi' => 'Desa Pasar Laguboti sebagai sentra perdagangan yang modern dan sejahtera.',
                'misi' => 'Mengembangkan sektor perdagangan dan jasa, meningkatkan sarana prasarana, dan memberdayakan ekonomi masyarakat.'
            ],
            'Porsea' => [
                'visi' => 'Desa Porsea yang indah, sejahtera, dan berbudaya.',
                'misi' => 'Mengembangkan pariwisata, meningkatkan kesejahteraan masyarakat, dan melestarikan kearifan lokal.'
            ],
            'Simanindo' => [
                'visi' => 'Desa Simanindo sebagai destinasi wisata budaya unggulan.',
                'misi' => 'Melestarikan warisan budaya Batak, mengembangkan industri pariwisata, dan meningkatkan ekonomi masyarakat.'
            ],
            'Pangururan' => [
                'visi' => 'Desa Pangururan yang maju, mandiri, dan berdaya saing.',
                'misi' => 'Meningkatkan kualitas SDM, mengembangkan potensi ekonomi lokal, dan memperkuat kapasitas kelembagaan desa.'
            ]
        ];

        foreach ($visiMisiData as $villageName => $data) {
            $village = Village::where('name', $villageName)->first();
            if ($village) {
                $village->update([
                    'visi' => $data['visi'],
                    'misi' => $data['misi']
                ]);
                echo "✓ Updated: {$villageName}\n";
            }
        }

        echo "\n=== Visi & Misi berhasil diisi untuk semua desa! ===\n";
    }
}
