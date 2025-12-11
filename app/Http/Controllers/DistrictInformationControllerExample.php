<?php

namespace App\Http\Controllers;

use App\Services\ApiService;
use Illuminate\Http\Request;

/**
 * CONTOH CONTROLLER YANG SUDAH DIUPDATE
 * untuk menggunakan ApiService (Producer API)
 * 
 * Ganti controller lama Anda dengan pola seperti ini
 */
class DistrictInformationController extends Controller
{
    protected $apiService;

    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    /**
     * Display all districts
     */
    public function index()
    {
        $response = $this->apiService->getDistricts();

        // Handle error dari API
        if ($response['status'] === 'error') {
            return back()->with('error', $response['message']);
        }

        $districts = $response['data'] ?? [];

        return view('district-information.index', [
            'districts' => $districts,
        ]);
    }

    /**
     * Display district profile
     */
    public function profile($id)
    {
        $response = $this->apiService->getDistrict($id);

        if ($response['status'] === 'error') {
            return back()->with('error', 'District not found');
        }

        $district = $response['data'];

        return view('district-information.profile', [
            'district' => $district,
        ]);
    }

    /**
     * Display villages in district
     */
    public function villages($id)
    {
        $districtResponse = $this->apiService->getDistrict($id);

        if ($districtResponse['status'] === 'error') {
            return back()->with('error', 'District not found');
        }

        $villagesResponse = $this->apiService->getVillagesByDistrict($id);

        $district = $districtResponse['data'];
        $villages = $villagesResponse['data'] ?? [];

        return view('district-information.villages', [
            'district' => $district,
            'villages' => $villages,
        ]);
    }

    /**
     * Display village detail
     */
    public function villageDetail($id)
    {
        $response = $this->apiService->getVillage($id);

        if ($response['status'] === 'error') {
            return back()->with('error', 'Village not found');
        }

        $village = $response['data'];

        return view('district-information.village-detail', [
            'village' => $village,
        ]);
    }

    /**
     * Search districts
     */
    public function search(Request $request)
    {
        $query = $request->input('q', '');

        if (empty($query)) {
            return back()->with('warning', 'Please enter search query');
        }

        $response = $this->apiService->searchDistricts($query);

        $districts = $response['data'] ?? [];

        return view('district-information.index', [
            'districts' => $districts,
            'searchQuery' => $query,
        ]);
    }
}
