<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Village;
use App\Models\Citizen;
use App\Models\ServiceRequest;
use App\Models\Announcement;
use App\Models\Budget;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class VillageAdminController extends Controller
{
    public function dashboard()
    {
        // Set locale to Indonesian
        Carbon::setLocale('id');
        
        $user = auth()->user();
        $village = $user->village;
        
        // Statistik untuk dashboard
        $stats = [
            'total_citizens' => Citizen::where('village_id', $village->id)->count(),
            'total_requests' => ServiceRequest::whereHas('citizen', function($q) use ($village) {
                $q->where('village_id', $village->id);
            })->count(),
            'pending_requests' => ServiceRequest::whereHas('citizen', function($q) use ($village) {
                $q->where('village_id', $village->id);
            })->where('status', 'pending')->count(),
        ];
        
        // Ambil semua pengumuman terbaru
        $announcements = Announcement::where('village_id', $village->id)
            ->orderBy('date', 'desc')
            ->get();
        
        return view('village-admin.dashboard', compact('village', 'stats', 'announcements'));
    }
    
    public function profile()
    {
        $village = auth()->user()->village;
        return view('village-admin.profile', compact('village'));
    }
    
    public function kelolaInformasi()
    {
        $village = auth()->user()->village;
        return view('village-admin.kelola-informasi', compact('village'));
    }

    public function visiMisi()
    {
        $village = auth()->user()->village;
        return view('village-admin.visi-misi', compact('village'));
    }
    
    public function updateVisiMisi(Request $request)
    {
        $village = auth()->user()->village;
        
        $request->validate([
            'visi' => 'required|string',
            'misi' => 'required|string',
        ]);
        
        $village->update([
            'visi' => $request->visi,
            'misi' => $request->misi,
            'updated_at' => now(), // Force update timestamp
        ]);
        
        // Clear all cache after update
        \Artisan::call('cache:clear');
        \Artisan::call('view:clear');
        
        return back()->with('success', 'Visi dan Misi berhasil diperbarui dan langsung terlihat di halaman publik!');
    }
    
    public function storeAnnouncement(Request $request)
    {
        $village = auth()->user()->village;
        
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category' => 'nullable|string',
            'published_date' => 'required|date',
            'effective_date' => 'required|date',
            'end_date' => 'required|date',
            'location' => 'nullable|string',
            'contact' => 'nullable|string',
        ]);
        
        Announcement::create([
            'village_id' => $village->id,
            'title' => $request->title,
            'content' => $request->content,
            'date' => $request->published_date,
            'category' => $request->category,
            'effective_date' => $request->effective_date,
            'end_date' => $request->end_date,
            'location' => $request->location,
            'contact' => $request->contact,
            'status' => 'published',
        ]);
        
        // Clear cache agar tampil di halaman publik
        \Artisan::call('cache:clear');
        \Artisan::call('view:clear');
        
        return back()->with('success', 'Pengumuman berhasil dipublikasikan dan langsung terlihat di halaman publik!');
    }
    
    public function updateAnnouncement(Request $request, $id)
    {
        $village = auth()->user()->village;
        $announcement = Announcement::where('village_id', $village->id)->findOrFail($id);
        
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'date' => 'required|date',
            'type' => 'nullable|in:meeting,program,evaluasi',
            'status' => 'required|in:pending,progress,done,published',
        ]);
        
        $announcement->update([
            'title' => $request->title,
            'content' => $request->content,
            'date' => $request->date,
            'type' => $request->type ?? $announcement->type,
            'status' => $request->status,
        ]);
        
        return back()->with('success', 'Pengumuman berhasil diperbarui!');
    }
    
    public function deleteAnnouncement($id)
    {
        $village = auth()->user()->village;
        $announcement = Announcement::where('village_id', $village->id)->findOrFail($id);
        $announcement->delete();
        
        return back()->with('success', 'Pengumuman berhasil dihapus!');
    }

    public function anggaran()
    {
        $village = auth()->user()->village;
        $budgets = Budget::where('village_id', $village->id)
            ->orderBy('year', 'desc')
            ->orderBy('quarter', 'desc')
            ->get();
        
        $latestBudget = $budgets->first();
        
        return view('village-admin.anggaran', compact('village', 'budgets', 'latestBudget'));
    }

    public function uploadBudget(Request $request)
    {
        $village = auth()->user()->village;
        
        $request->validate([
            'year' => 'required|integer|min:2000|max:' . (date('Y') + 1),
            'quarter' => 'nullable|integer|min:1|max:4',
            'budget_file' => 'required|file|mimes:pdf|max:10240', // Max 10MB
        ]);

        // Upload file baru
        $file = $request->file('budget_file');
        $fileName = 'anggaran_desa_' . str_replace(' ', '_', $village->name) . '_' . $request->year . ($request->quarter ? '_Q'.$request->quarter : '') . '_' . time() . '.pdf';
        $filePath = $file->storeAs('villages/budgets', $fileName, 'public');

        // Create Budget record
        Budget::create([
            'village_id' => $village->id,
            'year' => $request->year,
            'quarter' => $request->quarter,
            'file_name' => $file->getClientOriginalName(),
            'file_path' => $filePath,
        ]);

        // Update village budget_file (optional, for backward compatibility or main budget display)
        // We can keep the latest one as the main one
        $village->update([
            'budget_file' => $filePath,
        ]);

        return back()->with('success', 'Dokumen anggaran berhasil diunggah dan langsung terlihat di halaman publik!');
    }

    public function deleteBudget($id)
    {
        $village = auth()->user()->village;
        $budget = Budget::where('village_id', $village->id)->findOrFail($id);
        
        // Delete file from storage
        if (Storage::disk('public')->exists($budget->file_path)) {
            Storage::disk('public')->delete($budget->file_path);
        }
        
        // Delete from database
        $budget->delete();
        
        return back()->with('success', 'Dokumen anggaran berhasil dihapus!');
    }
}

