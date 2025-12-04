<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\DistrictPhoto;
use App\Models\DistrictNews;
use App\Models\DistrictAnnouncement;
use App\Models\DistrictAgenda;
use App\Models\DistrictBudget;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InformationController extends Controller
{
    public function index()
    {
        // Assuming we have one district (Kabupaten Toba)
        $district = District::with('photos')->first();
        
        // Gabungkan berita dengan agenda berita
        $newsItems = DistrictNews::orderBy('published_at', 'desc')->get();
        $agendaBerita = DistrictAgenda::where('display_type', 'berita')
            ->where('event_date', '>=', now()->startOfDay())
            ->get();
        
        $beritaCollection = collect();
        foreach ($newsItems as $item) {
            $beritaCollection->push((object)[
                'id' => $item->id,
                'type' => 'news',
                'title' => $item->title,
                'excerpt' => $item->excerpt,
                'content' => $item->content,
                'category' => $item->category,
                'date' => $item->published_at,
                'sort_date' => $item->published_at
            ]);
        }
        foreach ($agendaBerita as $item) {
            $beritaCollection->push((object)[
                'id' => $item->id,
                'type' => 'agenda',
                'title' => $item->title,
                'excerpt' => $item->description,
                'content' => $item->description,
                'category' => $item->category ?? 'Agenda',
                'date' => \Carbon\Carbon::parse($item->event_date),
                'time_start' => $item->time_start,
                'time_end' => $item->time_end,
                'location' => $item->location,
                'display_type' => $item->display_type,
                'sort_date' => \Carbon\Carbon::parse($item->event_date)
            ]);
        }
        $news = $beritaCollection->sortByDesc('sort_date');
        
        // Gabungkan pengumuman dengan agenda pengumuman
        $announcementItems = DistrictAnnouncement::orderBy('published_at', 'desc')->get();
        $agendaPengumuman = DistrictAgenda::where('display_type', 'pengumuman')
            ->where('event_date', '>=', now()->startOfDay())
            ->get();
        
        $pengumumanCollection = collect();
        foreach ($announcementItems as $item) {
            $pengumumanCollection->push((object)[
                'id' => $item->id,
                'type' => 'announcement',
                'title' => $item->title,
                'content' => $item->content,
                'date' => $item->published_at,
                'sort_date' => $item->published_at
            ]);
        }
        foreach ($agendaPengumuman as $item) {
            $pengumumanCollection->push((object)[
                'id' => $item->id,
                'type' => 'agenda',
                'title' => $item->title,
                'content' => $item->description,
                'category' => $item->category ?? 'Agenda',
                'date' => \Carbon\Carbon::parse($item->event_date),
                'time_start' => $item->time_start,
                'time_end' => $item->time_end,
                'location' => $item->location,
                'display_type' => $item->display_type,
                'sort_date' => \Carbon\Carbon::parse($item->event_date)
            ]);
        }
        $announcements = $pengumumanCollection->sortByDesc('sort_date');
        
        $agendas = DistrictAgenda::orderBy('event_date', 'asc')->get();
        
        // Get district budgets
        $budgets = DistrictBudget::where('district_id', $district->id ?? 1)
            ->orderBy('year', 'desc')
            ->orderBy('created_at', 'desc')
            ->get();
        
        return view('admin.information.index', compact('district', 'news', 'announcements', 'agendas', 'budgets'));
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
            'photo' => 'required|image|mimes:jpeg,jpg,png|max:5120',
        ]);

        $file = $request->file('photo');
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
            'photo' => 'required|image|mimes:jpeg,jpg,png|max:5120',
        ]);

        $file = $request->file('photo');
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

    // News CRUD
    public function storeNews(Request $request)
    {
        $request->validate([
            'category' => 'required|string|max:100',
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
        ]);

        $district = District::first();

        DistrictNews::create([
            'district_id' => $district->id,
            'category' => $request->category,
            'title' => $request->title,
            'excerpt' => $request->excerpt,
            'content' => $request->content,
            'published_at' => now(),
            'published_by' => auth()->id()
        ]);

        \Artisan::call('cache:clear');
        \Artisan::call('view:clear');

        return back()->with('success', 'Berita berhasil ditambahkan!');
    }

    public function updateNews(Request $request, $id)
    {
        $request->validate([
            'category' => 'required|string|max:100',
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
        ]);

        $news = DistrictNews::findOrFail($id);
        $news->update([
            'category' => $request->category,
            'title' => $request->title,
            'excerpt' => $request->excerpt,
            'content' => $request->content,
        ]);

        \Artisan::call('cache:clear');
        \Artisan::call('view:clear');

        return back()->with('success', 'Berita berhasil diperbarui!');
    }

    public function deleteNews($id)
    {
        $news = DistrictNews::findOrFail($id);
        $news->delete();

        \Artisan::call('cache:clear');
        \Artisan::call('view:clear');

        return back()->with('success', 'Berita berhasil dihapus!');
    }

    // Announcements CRUD
    public function storeAnnouncement(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $district = District::first();

        DistrictAnnouncement::create([
            'district_id' => $district->id,
            'title' => $request->title,
            'content' => $request->content,
            'published_at' => now(),
            'published_by' => auth()->id()
        ]);

        \Artisan::call('cache:clear');
        \Artisan::call('view:clear');

        return back()->with('success', 'Pengumuman berhasil ditambahkan!');
    }

    public function updateAnnouncement(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $announcement = DistrictAnnouncement::findOrFail($id);
        $announcement->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        \Artisan::call('cache:clear');
        \Artisan::call('view:clear');

        return back()->with('success', 'Pengumuman berhasil diperbarui!');
    }

    public function deleteAnnouncement($id)
    {
        $announcement = DistrictAnnouncement::findOrFail($id);
        $announcement->delete();

        \Artisan::call('cache:clear');
        \Artisan::call('view:clear');

        return back()->with('success', 'Pengumuman berhasil dihapus!');
    }

    // Agenda Management
    public function storeAgenda(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'event_date' => 'required|date',
            'time_start' => 'nullable|date_format:H:i',
            'time_end' => 'nullable|date_format:H:i',
            'location' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:100',
            'display_type' => 'required|in:berita,pengumuman',
            'participants' => 'nullable|string|max:255',
        ]);

        $district = District::first();
        
        DistrictAgenda::create([
            'district_id' => $district->id,
            'title' => $request->title,
            'description' => $request->description,
            'event_date' => $request->event_date,
            'time_start' => $request->time_start,
            'time_end' => $request->time_end,
            'location' => $request->location,
            'category' => $request->category,
            'display_type' => $request->display_type,
            'participants' => $request->participants,
            'created_by' => auth()->id(),
        ]);

        \Artisan::call('cache:clear');
        \Artisan::call('view:clear');

        return back()->with('success', 'Agenda berhasil ditambahkan!');
    }

    public function updateAgenda(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'event_date' => 'required|date',
            'time_start' => 'nullable|date_format:H:i',
            'time_end' => 'nullable|date_format:H:i',
            'location' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:100',
            'display_type' => 'required|in:berita,pengumuman',
            'participants' => 'nullable|string|max:255',
        ]);

        $agenda = DistrictAgenda::findOrFail($id);
        $agenda->update([
            'title' => $request->title,
            'description' => $request->description,
            'event_date' => $request->event_date,
            'time_start' => $request->time_start,
            'time_end' => $request->time_end,
            'location' => $request->location,
            'category' => $request->category,
            'display_type' => $request->display_type,
            'participants' => $request->participants,
        ]);

        \Artisan::call('cache:clear');
        \Artisan::call('view:clear');

        return back()->with('success', 'Agenda berhasil diperbarui!');
    }

    public function deleteAgenda($id)
    {
        $agenda = DistrictAgenda::findOrFail($id);
        $agenda->delete();

        \Artisan::call('cache:clear');
        \Artisan::call('view:clear');

        return back()->with('success', 'Agenda berhasil dihapus!');
    }

    public function uploadBudget(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'year' => 'required|string|max:4',
            'budget_file' => 'required|file|mimes:pdf|max:10240', // Max 10MB
            'description' => 'nullable|string',
        ]);

        $district = District::first();
        
        if ($request->hasFile('budget_file')) {
            $file = $request->file('budget_file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('budgets', $fileName, 'public');

            DistrictBudget::create([
                'district_id' => $district->id ?? 1,
                'title' => $request->title,
                'year' => $request->year,
                'file_path' => $filePath,
                'file_name' => $file->getClientOriginalName(),
                'file_type' => $file->getClientOriginalExtension(),
                'file_size' => $file->getSize(),
                'description' => $request->description,
                'created_by' => auth()->id(),
            ]);

            \Artisan::call('cache:clear');
            \Artisan::call('view:clear');

            return back()->with('success', 'File anggaran berhasil diupload!');
        }

        return back()->with('error', 'File tidak ditemukan!');
    }

    public function deleteBudget($id)
    {
        $budget = DistrictBudget::findOrFail($id);
        
        // Delete file from storage
        if (Storage::disk('public')->exists($budget->file_path)) {
            Storage::disk('public')->delete($budget->file_path);
        }
        
        $budget->delete();

        \Artisan::call('cache:clear');
        \Artisan::call('view:clear');

        return back()->with('success', 'File anggaran berhasil dihapus!');
    }
}
