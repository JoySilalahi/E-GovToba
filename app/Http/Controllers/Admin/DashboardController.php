<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceRequest;
use App\Models\Service;
use App\Models\Citizen;
use App\Models\District;
use App\Models\DistrictPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil data district dengan relasi photos dan villages
        $district = District::with(['photos', 'villages'])->first();
        
        return view('admin.dashboard', compact('district'));
    }
    
    public function oldIndex()
    {
        $district = District::first();
        
        $stats = [
            'total_requests' => ServiceRequest::count(),
            'completed_requests' => ServiceRequest::where('status', 'completed')->count(),
            'processing_requests' => ServiceRequest::whereIn('status', ['pending', 'processing'])->count(),
            'total_citizens' => Citizen::count(),
        ];

        $recentRequests = ServiceRequest::with(['service', 'citizen'])
            ->latest()
            ->take(10)
            ->get();

        $popularServices = Service::withCount('requests')
            ->orderByDesc('requests_count')
            ->take(6)
            ->get();

        return view('admin.dashboard-old', compact('district', 'stats', 'recentRequests', 'popularServices'));
    }
    
    public function updateVisiMisi(Request $request)
    {
        $request->validate([
            'visi' => 'required|string',
            'misi' => 'required|string',
        ]);

        $district = District::first();
        
        if (!$district) {
            return back()->with('error', 'Data kabupaten tidak ditemukan.');
        }

        $district->update([
            'visi' => $request->visi,
            'misi' => $request->misi,
        ]);

        \Artisan::call('cache:clear');
        \Artisan::call('view:clear');

        return back()->with('success', 'Visi dan Misi berhasil diperbarui!');
    }
    
    public function uploadPhoto(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,jpg,png|max:5120',
        ]);

        $district = District::first();
        
        if (!$district) {
            return back()->with('error', 'Data kabupaten tidak ditemukan.');
        }

        $file = $request->file('photo');
        $fileName = 'photo_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $filePath = $file->storeAs('districts/photos', $fileName, 'public');

        DistrictPhoto::create([
            'district_id' => $district->id,
            'photo_path' => $filePath,
            'title' => $request->title,
        ]);

        return back()->with('success', 'Foto berhasil diunggah!');
    }
    
    public function uploadBupatiPhoto(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,jpg,png|max:5120',
        ]);

        $file = $request->file('photo');
        $fileName = 'bupati.jpg';
        $file->move(public_path('images'), $fileName);

        return back()->with('success', 'Foto Bupati berhasil diperbarui!');
    }
    
    public function uploadWakilPhoto(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,jpg,png|max:5120',
        ]);

        $file = $request->file('photo');
        $fileName = 'wakil-bupati.jpg';
        $file->move(public_path('images'), $fileName);

        return back()->with('success', 'Foto Wakil Bupati berhasil diperbarui!');
    }
    
    public function deletePhoto($id)
    {
        $photo = DistrictPhoto::findOrFail($id);
        
        // Hapus file dari storage
        if (Storage::disk('public')->exists($photo->photo_path)) {
            Storage::disk('public')->delete($photo->photo_path);
        }

        // Hapus dari database
        $photo->delete();

        return back()->with('success', 'Foto berhasil dihapus!');
    }

    public function updateBupati(Request $request)
    {
        $request->validate([
            'bupati_name' => 'required|string|max:255',
            'periode' => 'required|string|max:255'
        ]);

        $district = District::first();
        $district->bupati_name = $request->bupati_name;
        $district->periode = $request->periode;
        $district->save();

        // Clear cache
        \Artisan::call('cache:clear');
        \Artisan::call('view:clear');

        return redirect()->back()->with('success', 'Data Bupati berhasil diperbarui!');
    }

    public function updateWakilBupati(Request $request)
    {
        $request->validate([
            'wakil_bupati_name' => 'required|string|max:255',
            'periode' => 'required|string|max:255'
        ]);

        $district = District::first();
        $district->wakil_bupati_name = $request->wakil_bupati_name;
        $district->periode = $request->periode;
        $district->save();

        // Clear cache
        \Artisan::call('cache:clear');
        \Artisan::call('view:clear');

        return redirect()->back()->with('success', 'Data Wakil Bupati berhasil diperbarui!');
    }
}