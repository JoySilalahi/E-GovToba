<?php

namespace App\Http\Controllers\Api;

use App\Models\Village;
use App\Models\District;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VillageController extends Controller
{
    /**
     * Get all villages
     */
    public function index()
    {
        try {
            $villages = Village::with('district')->get();

            return response()->json([
                'status' => 'success',
                'message' => 'Villages retrieved successfully',
                'data' => $villages,
                'count' => $villages->count(),
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to retrieve villages',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Get single village by ID
     */
    public function show($id)
    {
        try {
            $village = Village::with(['district', 'announcements', 'services'])->find($id);

            if (!$village) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Village not found',
                ], 404);
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Village retrieved successfully',
                'data' => $village,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to retrieve village',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Get villages by district ID
     */
    public function byDistrict($districtId)
    {
        try {
            $district = District::find($districtId);

            if (!$district) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'District not found',
                ], 404);
            }

            $villages = Village::where('district_id', $districtId)
                ->with('district')
                ->get();

            return response()->json([
                'status' => 'success',
                'message' => 'Villages retrieved successfully',
                'data' => $villages,
                'count' => $villages->count(),
                'district' => $district->name,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to retrieve villages',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Search villages by name
     */
    public function search(Request $request)
    {
        try {
            $query = $request->input('q', '');

            $villages = Village::where('name', 'LIKE', "%{$query}%")
                ->orWhere('code', 'LIKE', "%{$query}%")
                ->with('district')
                ->get();

            return response()->json([
                'status' => 'success',
                'data' => $villages,
                'count' => $villages->count(),
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Search failed',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
