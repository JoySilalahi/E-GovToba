<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Village;
use App\Models\District;

class DistrictInformationController extends Controller
{
    public function index()
    {
        // Disable cache untuk data fresh
        header('Cache-Control: no-cache, no-store, must-revalidate');
        header('Pragma: no-cache');
        header('Expires: 0');
        
        // Ambil data fresh dari database
        $district = District::first();
        
        // Ambil foto terbaru yang diupload admin
        $photos = \App\Models\DistrictPhoto::with('district')
            ->orderBy('created_at', 'desc')
            ->limit(6)
            ->get();
        
        // Ambil desa dengan visi & misi terbaru
        $villagesWithVision = Village::whereNotNull('visi')
            ->whereNotNull('misi')
            ->orderBy('updated_at', 'desc')
            ->limit(3)
            ->get();
        
        $statistics = [
            'population' => '202,453',
            'area' => '2,328.89',
            'villages' => Village::count(),
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

        return view('district-information.index', compact('statistics', 'features', 'tourismSpots', 'district', 'photos', 'villagesWithVision'));
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
        // Disable cache untuk data fresh
        header('Cache-Control: no-cache, no-store, must-revalidate');
        header('Pragma: no-cache');
        header('Expires: 0');
        
        // Ambil data fresh dari database tanpa cache
        $district = District::first();
        
        // Ambil foto yang diupload admin
        $photos = \App\Models\DistrictPhoto::with('district')
            ->orderBy('created_at', 'desc')
            ->get();
        
        return view('district-information.profile', compact('district', 'photos'));
    }

    public function villages()
    {
        // Disable cache untuk data fresh
        header('Cache-Control: no-cache, no-store, must-revalidate');
        header('Pragma: no-cache');
        header('Expires: 0');
        
        // Ambil data desa dari database tanpa cache
        $villagesFromDb = Village::with('district')->get();
        
        $villages = $villagesFromDb->map(function($village) {
            return [
                'id' => $village->id,
                'name' => $village->name,
                'image' => $village->image ?? 'desa ' . strtolower($village->name) . '.jpg',
                'description' => $village->description ?? 'Desa ' . $village->name,
                'population' => $village->population,
                'area' => $village->area . ' km²'
            ];
        })->toArray();

        // compute totals
        $totalVillages = count($villages);
        $totalPopulation = array_sum(array_column($villages, 'population'));

        return view('district-information.villages', compact('villages', 'totalVillages', 'totalPopulation'));
    }

    public function villageDetail($id)
    {
        // Disable browser cache
        header('Cache-Control: no-cache, no-store, must-revalidate');
        header('Pragma: no-cache');
        header('Expires: 0');
        
        // Ambil data desa dari database
        $villageFromDb = Village::findOrFail($id);
        
        // Format data untuk view
        $village = [
            'id' => $villageFromDb->id,
            'name' => $villageFromDb->name,
            'image' => $villageFromDb->image ?? 'desa ' . strtolower($villageFromDb->name) . '.jpg',
            'population' => $villageFromDb->population,
            'visi' => $villageFromDb->visi ?? 'Visi belum ditetapkan. Silakan hubungi admin desa untuk informasi lebih lanjut.',
            'misi' => $villageFromDb->misi ?? 'Misi belum ditetapkan. Silakan hubungi admin desa untuk informasi lebih lanjut.',
            'updated_at' => $villageFromDb->updated_at->timestamp ?? time(),
            'programs' => [
                [
                    'title' => 'Program Bantuan Kawasan Daerah Toba',
                    'description' => 'Pembangunan infrastruktur desa untuk mendukung kawasan Danau Toba'
                ],
                [
                    'title' => 'Pengembangan Wisata Berkelanjutan',
                    'description' => 'Menciptakan paket wisata untuk mengembangkan pariwisata lokal'
                ],
                [
                    'title' => 'Festival Budaya Batak',
                    'description' => 'Penyelenggaraan festival budaya untuk pelestarian tradisi Batak'
                ]
            ],
            'budget' => 'APBD 2025',
            'leader' => [
                'name' => $villageFromDb->village_head,
                'title' => 'Kepala Desa'
            ],
            'stats' => [
                ['label' => 'Agenda Mendatang', 'value' => '3', 'sublabel' => 'Kegiatan'],
                ['label' => 'Hasil Koordinasi', 'value' => '8', 'sublabel' => 'Pertemuan'],
                ['label' => 'Berita Pengumuman', 'value' => '12', 'sublabel' => 'Berita'],
                ['label' => 'Laporan', 'value' => '5', 'sublabel' => 'Dokumen']
            ]
        ];
        
        return view('district-information.village-detail', compact('village'));
    }
    
    public function checkVillageUpdate($id)
    {
        $village = Village::findOrFail($id);
        
        return response()->json([
            'updated_at' => $village->updated_at->timestamp,
            'visi' => $village->visi,
            'misi' => $village->misi
        ]);
    }
}
