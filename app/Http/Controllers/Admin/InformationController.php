<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\District;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    public function index()
    {
        // Assuming we have one district (Kabupaten Toba)
        $district = District::first();
        
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

        return back()->with('success', 'Visi dan Misi berhasil diperbarui!');
    }
}
