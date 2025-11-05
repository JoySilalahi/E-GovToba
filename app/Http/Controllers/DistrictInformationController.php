<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DistrictInformationController extends Controller
{
    public function index()
    {
        $statistics = [
            'population' => '202,453',
            'area' => '2,328.89',
            'villages' => '243',
            'subdistricts' => '16'
        ];

        $features = [
            [
                'icon' => 'fa-landmark',
                'title' => 'Pelayanan Publik',
                'description' => 'Layanan online 24/7 untuk mempermudah masyarakat'
            ],
            [
                'icon' => 'fa-chart-line',
                'title' => 'Transparansi',
                'description' => 'Informasi anggaran dan program pembangunan yang transparan'
            ],
            [
                'icon' => 'fa-users',
                'title' => 'Partisipasi Masyarakat',
                'description' => 'Platform untuk aspirasi dan partisipasi masyarakat'
            ]
        ];

        $tourismSpots = [
            [
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/93/Danau_Toba_Samosir.jpg/1280px-Danau_Toba_Samosir.jpg',
                'name' => 'Danau Toba',
                'description' => 'Danau vulkanik terbesar di dunia'
            ],
            [
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/4d/Batak_architecture_at_Lake_Toba%2C_Sumatra%2C_Indonesia.jpg/1280px-Batak_architecture_at_Lake_Toba%2C_Sumatra%2C_Indonesia.jpg',
                'name' => 'Rumah Adat Batak',
                'description' => 'Arsitektur tradisional yang mencerminkan budaya Batak'
            ],
            [
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/62/Tor_Simanindo.jpg/1280px-Tor_Simanindo.jpg',
                'name' => 'Tor Simanindo',
                'description' => 'Destinasi wisata dengan pemandangan indah'
            ]
        ];

        return view('district-information.index', compact('statistics', 'features', 'tourismSpots'));
    }

    public function tourism()
    {
        return view('district-information.tourism');
    }

    public function culture()
    {
        return view('district-information.culture');
    }

    public function profile()
    {
        return view('district-information.profile');
    }

    public function villages()
    {
        // Data desa dari database
        $villages = [
            [
                'id' => 1,
                'name' => 'Desa Meat',
                'image' => 'desa meat.jpg',
                'description' => 'Desa di Kecamatan Ajibata di tepi yang indah dengan sawah hijau',
                'population' => 850,
                'area' => '15.3 km²'
            ],
            [
                'id' => 2,
                'name' => 'Desa Aek Bolon Julu',
                'image' => 'desa aek bolon julu.jpg',
                'description' => 'Desa dengan rumah adat tradisional Batak yang masih terjaga',
                'population' => 1258,
                'area' => '8.7 km²'
            ],
            [
                'id' => 3,
                'name' => 'Desa Pangombusan',
                'image' => 'desa pangombusan.jpg',
                'description' => 'Sebuah desa yang indah dengan pemandangan yang menakjubkan',
                'population' => 2344,
                'area' => '23.1 km²'
            ],
            [
                'id' => 4,
                'name' => 'Desa Pararpuan',
                'image' => 'desa pareparean.jpg',
                'description' => 'Desa dengan rumah adat berjajar yang mencerminkan budaya Batak',
                'population' => 600,
                'area' => '19.3 km²'
            ],
            [
                'id' => 5,
                'name' => 'Desa Pintu Bosi',
                'image' => 'desa pintu bosi.jpg',
                'description' => 'Pusat layanan pemerintahan desa yang melayani masyarakat',
                'population' => 256,
                'area' => '6.7 km²'
            ],
            [
                'id' => 6,
                'name' => 'Desa Sigumpar Toba',
                'image' => 'desa sigumpar.jpeg',
                'description' => 'Desa yang terletak di dataran tinggi dengan udara sejuk',
                'population' => 1384,
                'area' => '21.1 km²'
            ]
        ];

        // compute totals
        $totalVillages = count($villages);
        $totalPopulation = array_sum(array_column($villages, 'population'));

        return view('district-information.villages', compact('villages', 'totalVillages', 'totalPopulation'));
    }

    public function villageDetail($id)
    {
        // Data detail desa
        $villagesData = [
            1 => [
                'id' => 1,
                'name' => 'Desa Meat',
                'image' => 'desa meat.jpg',
                'population' => 900,
                'visi' => 'Mewujudkan Desa Meat yang Mandiri, Sejahtera, dan Berbudaya dengan semangat gotong royong.',
                'misi' => 'Meningkatkan kualitas sumber daya manusia, mengoptimalkan potensi desa di bidang pertanian dan pariwisata, serta melestarikan adat dan budaya lokal.',
                'programs' => [
                    [
                        'title' => 'Program Bantuan Kawasan Daerah Toba',
                        'description' => 'Pembangunan infrastruktur desa untuk mendukung kawasan Danau Toba'
                    ],
                    [
                        'title' => 'Pengembangan Wisata Berkelanjutan',
                        'description' => 'Menciptakan paket wisata untuk mengembangkan pariwisata lokal di kawasan Danau Toba'
                    ],
                    [
                        'title' => 'Festival Budaya Batak',
                        'description' => 'Penyelenggaraan festival budaya untuk pelestarian tradisi Batak di kawasan wisata desa'
                    ]
                ],
                'budget' => 'APBD 2025',
                'leader' => [
                    'name' => 'Joni M. Simanjuntak',
                    'title' => 'Kepala Desa'
                ],
                'stats' => [
                    ['label' => 'Agenda Mendatang', 'value' => '3', 'sublabel' => 'Kegiatan'],
                    ['label' => 'Hasil Koordinasi Antar Kabupaten', 'value' => '8', 'sublabel' => 'Pertemuan'],
                    ['label' => 'Berita Pengumuman Warga Toba', 'value' => '12', 'sublabel' => 'Berita'],
                    ['label' => 'Sambutan Dampak Lingkungan Wilayah', 'value' => '5', 'sublabel' => 'Laporan SDM']
                ]
            ],
            2 => [
                'id' => 2,
                'name' => 'Desa Aek Bolon Julu',
                'image' => 'desa aek bolon julu.jpg',
                'population' => 1258,
                'visi' => 'Menjadikan Desa Aek Bolon Julu sebagai desa wisata budaya yang lestari dan sejahtera.',
                'misi' => 'Melestarikan rumah adat dan tradisi Batak, mengembangkan ekonomi kreatif berbasis budaya, meningkatkan kesejahteraan masyarakat.',
                'programs' => [
                    [
                        'title' => 'Pelestarian Rumah Adat Batak',
                        'description' => 'Program renovasi dan pemeliharaan rumah adat tradisional Batak'
                    ],
                    [
                        'title' => 'Pelatihan Kerajinan Tradisional',
                        'description' => 'Pemberdayaan masyarakat melalui pelatihan kerajinan ulos dan ukiran'
                    ],
                    [
                        'title' => 'Wisata Budaya Kampung Adat',
                        'description' => 'Pengembangan kampung adat sebagai destinasi wisata budaya'
                    ]
                ],
                'budget' => 'APBD 2025',
                'leader' => [
                    'name' => 'Robert Situmorang',
                    'title' => 'Kepala Desa'
                ],
                'stats' => [
                    ['label' => 'Agenda Mendatang', 'value' => '5', 'sublabel' => 'Kegiatan'],
                    ['label' => 'Hasil Koordinasi', 'value' => '6', 'sublabel' => 'Pertemuan'],
                    ['label' => 'Pengumuman', 'value' => '8', 'sublabel' => 'Berita'],
                    ['label' => 'Laporan', 'value' => '4', 'sublabel' => 'Dokumen']
                ]
            ],
            3 => [
                'id' => 3,
                'name' => 'Desa Pangombusan',
                'image' => 'desa pangombusan.jpg',
                'population' => 2344,
                'visi' => 'Desa Pangombusan yang maju, mandiri, dan sejahtera berbasis pertanian.',
                'misi' => 'Meningkatkan produktivitas pertanian, mengembangkan infrastruktur desa, memberdayakan ekonomi masyarakat.',
                'programs' => [
                    [
                        'title' => 'Modernisasi Pertanian',
                        'description' => 'Program bantuan alat pertanian modern untuk meningkatkan produktivitas'
                    ],
                    [
                        'title' => 'Irigasi Sawah',
                        'description' => 'Pembangunan sistem irigasi untuk mendukung pertanian berkelanjutan'
                    ],
                    [
                        'title' => 'Pemasaran Hasil Tani',
                        'description' => 'Pengembangan akses pasar untuk produk pertanian lokal'
                    ]
                ],
                'budget' => 'APBD 2025',
                'leader' => [
                    'name' => 'Mangatas Hutabarat',
                    'title' => 'Kepala Desa'
                ],
                'stats' => [
                    ['label' => 'Agenda Mendatang', 'value' => '4', 'sublabel' => 'Kegiatan'],
                    ['label' => 'Koordinasi', 'value' => '10', 'sublabel' => 'Pertemuan'],
                    ['label' => 'Berita', 'value' => '15', 'sublabel' => 'Artikel'],
                    ['label' => 'Laporan', 'value' => '7', 'sublabel' => 'Dokumen']
                ]
            ],
            4 => [
                'id' => 4,
                'name' => 'Desa Pararpuan',
                'image' => 'desa pareparean.jpg',
                'population' => 600,
                'visi' => 'Desa Pararpuan yang harmonis, religius, dan berbudaya.',
                'misi' => 'Melestarikan nilai-nilai kearifan lokal, meningkatkan kualitas kehidupan beragama, membangun kerukunan warga.',
                'programs' => [
                    [
                        'title' => 'Revitalisasi Rumah Adat',
                        'description' => 'Pemugaran dan perawatan rumah adat sebagai warisan budaya'
                    ],
                    [
                        'title' => 'Festival Budaya Tahunan',
                        'description' => 'Penyelenggaraan festival adat untuk melestarikan tradisi'
                    ],
                    [
                        'title' => 'Pemberdayaan Pemuda',
                        'description' => 'Program pelatihan keterampilan untuk generasi muda'
                    ]
                ],
                'budget' => 'APBD 2025',
                'leader' => [
                    'name' => 'Hotman Siahaan',
                    'title' => 'Kepala Desa'
                ],
                'stats' => [
                    ['label' => 'Agenda', 'value' => '2', 'sublabel' => 'Kegiatan'],
                    ['label' => 'Koordinasi', 'value' => '5', 'sublabel' => 'Pertemuan'],
                    ['label' => 'Pengumuman', 'value' => '6', 'sublabel' => 'Berita'],
                    ['label' => 'Laporan', 'value' => '3', 'sublabel' => 'Dokumen']
                ]
            ],
            5 => [
                'id' => 5,
                'name' => 'Desa Pintu Bosi',
                'image' => 'desa pintu bosi.jpg',
                'population' => 256,
                'visi' => 'Desa Pintu Bosi yang tertib administrasi dan pelayanan prima.',
                'misi' => 'Meningkatkan kualitas pelayanan publik, digitalisasi administrasi desa, transparansi pengelolaan desa.',
                'programs' => [
                    [
                        'title' => 'Digitalisasi Layanan Desa',
                        'description' => 'Implementasi sistem pelayanan online untuk kemudahan warga'
                    ],
                    [
                        'title' => 'Peningkatan SDM Aparatur',
                        'description' => 'Pelatihan untuk meningkatkan kompetensi perangkat desa'
                    ],
                    [
                        'title' => 'Transparansi Anggaran',
                        'description' => 'Publikasi laporan keuangan desa secara berkala'
                    ]
                ],
                'budget' => 'APBD 2025',
                'leader' => [
                    'name' => 'Darwin Panjaitan',
                    'title' => 'Kepala Desa'
                ],
                'stats' => [
                    ['label' => 'Agenda', 'value' => '3', 'sublabel' => 'Kegiatan'],
                    ['label' => 'Koordinasi', 'value' => '4', 'sublabel' => 'Pertemuan'],
                    ['label' => 'Pengumuman', 'value' => '5', 'sublabel' => 'Berita'],
                    ['label' => 'Laporan', 'value' => '2', 'sublabel' => 'Dokumen']
                ]
            ],
            6 => [
                'id' => 6,
                'name' => 'Desa Sigumpar Toba',
                'image' => 'desa sigumpar.jpeg',
                'population' => 1384,
                'visi' => 'Desa Sigumpar Toba yang sejuk, asri, dan berkelanjutan.',
                'misi' => 'Menjaga kelestarian lingkungan, mengembangkan ekowisata, meningkatkan kesejahteraan melalui pertanian organik.',
                'programs' => [
                    [
                        'title' => 'Penghijauan Wilayah Desa',
                        'description' => 'Program penanaman pohon untuk menjaga kelestarian lingkungan'
                    ],
                    [
                        'title' => 'Ekowisata Pegunungan',
                        'description' => 'Pengembangan destinasi wisata alam di dataran tinggi'
                    ],
                    [
                        'title' => 'Pertanian Organik',
                        'description' => 'Pembinaan petani untuk mengembangkan pertanian organik'
                    ]
                ],
                'budget' => 'APBD 2025',
                'leader' => [
                    'name' => 'Binsar Napitupulu',
                    'title' => 'Kepala Desa'
                ],
                'stats' => [
                    ['label' => 'Agenda', 'value' => '6', 'sublabel' => 'Kegiatan'],
                    ['label' => 'Koordinasi', 'value' => '7', 'sublabel' => 'Pertemuan'],
                    ['label' => 'Pengumuman', 'value' => '11', 'sublabel' => 'Berita'],
                    ['label' => 'Laporan', 'value' => '8', 'sublabel' => 'Dokumen']
                ]
            ]
        ];

        $village = $villagesData[$id] ?? abort(404);
        
        return view('district-information.village-detail', compact('village'));
    }
}
