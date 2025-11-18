<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceRequest;
use App\Models\Service;
use App\Models\Citizen;
use App\Models\District;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
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

        return view('admin.dashboard', compact('district', 'stats', 'recentRequests', 'popularServices'));
    }
}