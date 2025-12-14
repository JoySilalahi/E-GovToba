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

        // Ambil berita terbaru
        $beritaList = \App\Models\DistrictNews::where('district_id', $district->id ?? 1)
            ->orderBy('published_at', 'desc')
            ->limit(5)
            ->get();

        // Ambil pengumuman terbaru
        $pengumumanList = \App\Models\DistrictAnnouncement::where('district_id', $district->id ?? 1)
            ->orderBy('published_at', 'desc')
            ->limit(5)
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

        return view('district-information.index', compact('statistics', 'features', 'tourismSpots', 'district', 'photos', 'villagesWithVision', 'beritaList', 'pengumumanList'));
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
        
        // Ambil data budget
        $budgets = \App\Models\DistrictBudget::where('district_id', $district->id ?? 1)
            ->orderBy('year', 'desc')
            ->orderBy('created_at', 'desc')
            ->get();

        // Ambil berita terbaru
        $beritaList = \App\Models\DistrictNews::where('district_id', $district->id ?? 1)
            ->orderBy('published_at', 'desc')
            ->limit(10)
            ->get();

        // Ambil pengumuman terbaru
        $pengumumanList = \App\Models\DistrictAnnouncement::where('district_id', $district->id ?? 1)
            ->orderBy('published_at', 'desc')
            ->limit(10)
            ->get();

        // Ambil agenda dari database dan format untuk frontend
        $agendas = \App\Models\DistrictAgenda::where('district_id', $district->id ?? 1)
            ->where('status', '!=', 'selesai')  // hanya tampilkan agenda yang belum selesai
            ->orderBy('event_date', 'asc')
            ->get();

        // Format agenda data untuk JavaScript
        $simulated_events = [];
        foreach ($agendas as $agenda) {
            $dateStr = $agenda->event_date->format('Y-m-d');
            if (!isset($simulated_events[$dateStr])) {
                $simulated_events[$dateStr] = [];
            }
            $simulated_events[$dateStr][] = [
                'id' => $agenda->id,
                'title' => $agenda->title,
                'location' => $agenda->location ?? 'Lokasi tidak ditentukan',
                'time_start' => $agenda->time_start ?? '09:00',
                'time_end' => $agenda->time_end ?? '10:00',
                'status' => $agenda->status ?? 'mendatang',
                'category' => $agenda->category ?? 'Umum'
            ];
        }

        // Ambil agenda mendatang untuk sidebar
        $upcoming_agendas = $agendas->take(5);
        
        return view('district-information.profile', compact('district', 'photos', 'budgets', 'beritaList', 'pengumumanList', 'simulated_events', 'upcoming_agendas'));
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
            // determine image URL: if stored (storage/public) use storage path, otherwise fallback to public images folder
            if ($village->image && \Illuminate\Support\Facades\Storage::disk('public')->exists($village->image)) {
                $imageUrl = asset('storage/' . $village->image);
            } else {
                // Normalize name: remove leading 'desa ' if present
                $normalized = preg_replace('/^desa\s+/i', '', trim($village->name));
                $base = 'desa ' . strtolower($normalized);
                $candidates = ["{$base}.jpg", "{$base}.jpeg", "{$base}.png"];
                $found = null;
                foreach ($candidates as $c) {
                    if (file_exists(public_path('images/' . $c))) { $found = $c; break; }
                }
                if ($found) {
                    $imageUrl = asset('images/' . $found);
                } else {
                    // try fuzzy match: look for files containing a main token from the name
                    $tokens = preg_split('/\s+/', $normalized);
                    $token = $tokens[0] ?? $normalized;
                    $matches = glob(public_path('images/desa*' . $token . '*'));
                    if (!empty($matches)) {
                        // use first match (basename)
                        $imageUrl = asset('images/' . basename($matches[0]));
                    } else {
                        $imageUrl = asset('images/pemandangan-sawah.jpg');
                    }
                }
            }

            return [
                'id' => $village->id,
                'name' => $village->name,
                'image' => $imageUrl,
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
        // prepare image URL for detail view
        if ($villageFromDb->image && \Illuminate\Support\Facades\Storage::disk('public')->exists($villageFromDb->image)) {
            $detailImage = asset('storage/' . $villageFromDb->image);
        } else {
            $normalized = preg_replace('/^desa\s+/i', '', trim($villageFromDb->name));
            $base = 'desa ' . strtolower($normalized);
            $candidates = ["{$base}.jpg", "{$base}.jpeg", "{$base}.png"];
            $found = null;
            foreach ($candidates as $c) {
                if (file_exists(public_path('images/' . $c))) { $found = $c; break; }
            }
            if ($found) {
                $detailImage = asset('images/' . $found);
            } else {
                $tokens = preg_split('/\s+/', $normalized);
                $token = $tokens[0] ?? $normalized;
                $matches = glob(public_path('images/desa*' . $token . '*'));
                if (!empty($matches)) {
                    $detailImage = asset('images/' . basename($matches[0]));
                } else {
                    $detailImage = asset('images/pemandangan-sawah.jpg');
                }
            }
        }

        // Ambil data anggaran
        $budgets = \App\Models\Budget::where('village_id', $villageFromDb->id)
            ->orderBy('year', 'desc')
            ->orderBy('quarter', 'desc')
            ->get();

        $village = [
            'id' => $villageFromDb->id,
            'name' => $villageFromDb->name,
            'image' => $detailImage,
            'population' => $villageFromDb->population,
            'visi' => $villageFromDb->visi ?? 'Visi belum ditetapkan. Silakan hubungi admin desa untuk informasi lebih lanjut.',
            'misi' => $villageFromDb->misi ?? 'Misi belum ditetapkan. Silakan hubungi admin desa untuk informasi lebih lanjut.',
            'updated_at' => $villageFromDb->updated_at->timestamp ?? time(),
            'budget_file' => $villageFromDb->budget_file ? asset('storage/' . $villageFromDb->budget_file) : null,
            'budgets' => $budgets,
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
