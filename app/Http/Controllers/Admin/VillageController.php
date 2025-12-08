<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Village;
use App\Models\District;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VillageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $villages = Village::orderBy('name', 'asc')->get();
        return view('admin.villages.index', compact('villages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'population' => 'nullable|integer',
            'area' => 'nullable|numeric',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'village_head' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'phone' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:255',
        ]);

        // Get the district (Kabupaten Toba)
        $district = District::first();
        if (!$district) {
            return redirect()->route('admin.information.index')
                ->with('error', 'District not found. Please contact administrator.');
        }

        // Add district_id to validated data
        $validated['district_id'] = $district->id;

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('villages', 'public');
        }

        // Ensure DB NOT NULL columns have fallback values
        $validated['village_head'] = $validated['village_head'] ?? '';
        $validated['address'] = $validated['address'] ?? '';
        $validated['phone'] = $validated['phone'] ?? '';
        $validated['email'] = $validated['email'] ?? '';

        Village::create($validated);

        return redirect()->route('admin.information.index')
            ->with('success', 'Desa berhasil ditambahkan');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Village $village)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'population' => 'nullable|integer',
            'area' => 'nullable|numeric',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'village_head' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'phone' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:255',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($village->image) {
                Storage::disk('public')->delete($village->image);
            }
            $validated['image'] = $request->file('image')->store('villages', 'public');
        }

        // If village_head/address/phone/email provided, include them in update
        if ($request->filled('village_head')) {
            $validated['village_head'] = $request->input('village_head');
        }
        if ($request->filled('address')) {
            $validated['address'] = $request->input('address');
        }
        if ($request->filled('phone')) {
            $validated['phone'] = $request->input('phone');
        }
        if ($request->filled('email')) {
            $validated['email'] = $request->input('email');
        }

        $village->update($validated);

        return redirect()->route('admin.information.index')
            ->with('success', 'Desa berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Village $village)
    {
        // Delete image if exists
        if ($village->image) {
            Storage::disk('public')->delete($village->image);
        }

        $village->delete();

        return redirect()->route('admin.information.index')
            ->with('success', 'Desa berhasil dihapus');
    }
}
