<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\DistrictPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InformationController extends Controller
{
    public function index()
    {
        // Assuming we have one district (Kabupaten Toba)
        $district = District::with('photos')->first();
        
        return view('admin.information.index', compact('district'));
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

        // Clear any application cache
        \Artisan::call('cache:clear');
        \Artisan::call('view:clear');

        return back()->with('success', 'Visi dan Misi berhasil diperbarui! Perubahan langsung terlihat di halaman publik (Profil Kabupaten).');
    }

    public function uploadDocumentation(Request $request)
    {
        $request->validate([
            'documentation_file' => 'required|file|mimes:pdf,doc,docx|max:10240',
        ]);

        $district = District::first();
        
        if (!$district) {
            return back()->with('error', 'Data kabupaten tidak ditemukan.');
        }

        // Hapus file lama jika ada
        if ($district->documentation_file && \Storage::disk('public')->exists($district->documentation_file)) {
            \Storage::disk('public')->delete($district->documentation_file);
        }

        // Upload file baru
        $file = $request->file('documentation_file');
        $fileName = 'dokumentasi_kegiatan_' . time() . '.' . $file->getClientOriginalExtension();
        $filePath = $file->storeAs('districts/documentation', $fileName, 'public');

        $district->update([
            'documentation_file' => $filePath,
        ]);

        return back()->with('success', 'Dokumentasi kegiatan berhasil diunggah dan langsung terlihat di halaman publik!');
    }

    public function uploadPhoto(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,jpg,png|max:5120',
            'title' => 'nullable|string|max:255',
        ]);

        $district = District::first();
        
        if (!$district) {
            return back()->with('error', 'Data kabupaten tidak ditemukan.');
        }

        // Upload foto
        $file = $request->file('photo');
        $fileName = 'photo_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $filePath = $file->storeAs('districts/photos', $fileName, 'public');

        // Simpan ke database
        DistrictPhoto::create([
            'district_id' => $district->id,
            'photo_path' => $filePath,
            'title' => $request->title,
        ]);

        return back()->with('success', 'Foto berhasil diunggah dan langsung terlihat di halaman publik!');
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

    public function uploadBupatiPhoto(Request $request)
    {
        $request->validate([
            'bupati_photo' => 'required|image|mimes:jpeg,jpg,png|max:5120',
        ]);

        $file = $request->file('bupati_photo');
        $fileName = 'bupati.jpg';
        
        // Simpan ke folder public/images (menimpa file lama)
        $file->move(public_path('images'), $fileName);

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Foto Bupati berhasil diperbarui!']);
        }

        return back()->with('success', 'Foto Bupati berhasil diperbarui!');
    }

    public function uploadWakilBupatiPhoto(Request $request)
    {
        $request->validate([
            'wakil_bupati_photo' => 'required|image|mimes:jpeg,jpg,png|max:5120',
        ]);

        $file = $request->file('wakil_bupati_photo');
        $fileName = 'wakil-bupati.jpg';
        
        // Simpan ke folder public/images (menimpa file lama)
        $file->move(public_path('images'), $fileName);

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Foto Wakil Bupati berhasil diperbarui!']);
        }

        return back()->with('success', 'Foto Wakil Bupati berhasil diperbarui!');
    }

    public function updateNames(Request $request)
    {
        $request->validate([
            'bupati_name' => 'nullable|string|max:255',
            'wakil_bupati_name' => 'nullable|string|max:255',
        ]);

        $district = District::first();
        
        if (!$district) {
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json(['success' => false, 'message' => 'Data kabupaten tidak ditemukan.']);
            }
            return back()->with('error', 'Data kabupaten tidak ditemukan.');
        }

        $updateData = [];
        if ($request->has('bupati_name')) {
            $updateData['bupati_name'] = $request->bupati_name;
        }
        if ($request->has('wakil_bupati_name')) {
            $updateData['wakil_bupati_name'] = $request->wakil_bupati_name;
        }

        $district->update($updateData);

        // Clear cache
        \Artisan::call('cache:clear');
        \Artisan::call('view:clear');

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Nama berhasil diperbarui!']);
        }

        return back()->with('success', 'Nama berhasil diperbarui!');
    }

    public function updatePeriode(Request $request)
    {
        $request->validate([
            'periode' => 'required|string|max:100',
        ]);

        $district = District::first();
        
        if (!$district) {
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json(['success' => false, 'message' => 'Data kabupaten tidak ditemukan.']);
            }
            return back()->with('error', 'Data kabupaten tidak ditemukan.');
        }

        $district->update(['periode' => $request->periode]);

        // Clear cache
        \Artisan::call('cache:clear');
        \Artisan::call('view:clear');

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Periode berhasil diperbarui!']);
        }

        return back()->with('success', 'Periode berhasil diperbarui!');
    }
}
