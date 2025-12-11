<?php

namespace App\Http\Controllers\Api;

use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AnnouncementController extends Controller
{
    /**
     * Get all announcements
     */
    public function index()
    {
        try {
            $announcements = Announcement::with(['village', 'creator'])
                ->where('status', 'active')
                ->latest()
                ->get();

            return response()->json([
                'status' => 'success',
                'message' => 'Announcements retrieved successfully',
                'data' => $announcements,
                'count' => $announcements->count(),
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to retrieve announcements',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Get single announcement by ID
     */
    public function show($id)
    {
        try {
            $announcement = Announcement::with(['village', 'creator'])->find($id);

            if (!$announcement) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Announcement not found',
                ], 404);
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Announcement retrieved successfully',
                'data' => $announcement,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to retrieve announcement',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Get announcements by village ID
     */
    public function byVillage($villageId)
    {
        try {
            $announcements = Announcement::where('village_id', $villageId)
                ->where('status', 'active')
                ->with(['village', 'creator'])
                ->latest()
                ->get();

            return response()->json([
                'status' => 'success',
                'message' => 'Announcements retrieved successfully',
                'data' => $announcements,
                'count' => $announcements->count(),
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to retrieve announcements',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Search announcements
     */
    public function search(Request $request)
    {
        try {
            $query = $request->input('q', '');

            $announcements = Announcement::where('title', 'LIKE', "%{$query}%")
                ->orWhere('content', 'LIKE', "%{$query}%")
                ->where('status', 'active')
                ->with(['village', 'creator'])
                ->latest()
                ->get();

            return response()->json([
                'status' => 'success',
                'data' => $announcements,
                'count' => $announcements->count(),
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
