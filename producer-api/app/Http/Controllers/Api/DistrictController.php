<?php

namespace App\Http\Controllers\Api;

use App\Models\District;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DistrictController extends Controller
{
    /**
     * Get all districts
     */
    public function index()
    {
        try {
            $districts = District::with('villages')->get();

            return response()->json([
                'status' => 'success',
                'message' => 'Districts retrieved successfully',
                'data' => $districts,
                'count' => $districts->count(),
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to retrieve districts',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Get single district by ID
     */
    public function show($id)
    {
        try {
            $district = District::with(['villages', 'announcements', 'budgets', 'agendas'])->find($id);

            if (!$district) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'District not found',
                ], 404);
            }

            return response()->json([
                'status' => 'success',
                'message' => 'District retrieved successfully',
                'data' => $district,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to retrieve district',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Search districts by name
     */
    public function search(Request $request)
    {
        try {
            $query = $request->input('q', '');

            $districts = District::where('name', 'LIKE', "%{$query}%")
                ->orWhere('code', 'LIKE', "%{$query}%")
                ->get();

            return response()->json([
                'status' => 'success',
                'data' => $districts,
                'count' => $districts->count(),
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
