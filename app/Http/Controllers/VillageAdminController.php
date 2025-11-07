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
            'date' => 'required|date',
            'type' => 'nullable|in:meeting,program,evaluasi',
            'status' => 'required|in:pending,progress,done',
        ]);
        
        Announcement::create([
            'village_id' => $village->id,
            'title' => $request->title,
            'content' => $request->content,
            'date' => $request->date,
            'type' => $request->type ?? 'meeting',
            'status' => $request->status,
        ]);
        
        return back()->with('success', 'Pengumuman berhasil ditambahkan!');
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
            'status' => 'required|in:pending,progress,done',
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
            'budget_file' => 'required|file|mimes:pdf|max:10240', // Max 10MB
            'year' => 'required|integer|min:2020|max:' . (date('Y') + 1),
            'quarter' => 'nullable|integer|min:1|max:4',
        ]);

        // Upload file
        $file = $request->file('budget_file');
        $fileName = 'laporan_apbdes_' . $request->year . '_q' . ($request->quarter ?? 'full') . '.pdf';
        $filePath = $file->storeAs('budgets/' . $village->id, $fileName, 'public');

        // Save to database
        Budget::create([
            'village_id' => $village->id,
            'file_name' => $fileName,
            'file_path' => $filePath,
            'year' => $request->year,
            'quarter' => $request->quarter,
        ]);

        return back()->with('success', 'Dokumen anggaran berhasil diunggah!');
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

