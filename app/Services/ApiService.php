<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Exception;

class ApiService
{
    /**
     * Base URL untuk Producer API
     * Dapat dikonfigurasi via .env (API_BASE_URL)
     */
    private $baseUrl;
    
    /**
     * Timeout untuk HTTP request (detik)
     */
    private $timeout;
    
    /**
     * Cache duration (menit)
     */
    private $cacheMinutes;

    public function __construct()
    {
        $this->baseUrl = config('services.api.base_url', 'http://localhost:8001/api/v1');
        $this->timeout = config('services.api.timeout', 30);
        $this->cacheMinutes = config('services.api.cache_minutes', 60);
    }

    /**
     * Get all districts
     */
    public function getDistricts($forceRefresh = false)
    {
        $cacheKey = 'api_districts_all';
        
        if (!$forceRefresh && Cache::has($cacheKey)) {
            return Cache::get($cacheKey);
        }

        try {
            $response = Http::timeout($this->timeout)
                ->get("{$this->baseUrl}/districts");

            if ($response->successful()) {
                $data = $response->json();
                Cache::put($cacheKey, $data, now()->addMinutes($this->cacheMinutes));
                return $data;
            }

            return $this->errorResponse('Failed to fetch districts', $response->status());
        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }

    /**
     * Get single district by ID
     */
    public function getDistrict($id)
    {
        $cacheKey = "api_district_{$id}";
        
        if (Cache::has($cacheKey)) {
            return Cache::get($cacheKey);
        }

        try {
            $response = Http::timeout($this->timeout)
                ->get("{$this->baseUrl}/districts/{$id}");

            if ($response->successful()) {
                $data = $response->json();
                Cache::put($cacheKey, $data, now()->addMinutes($this->cacheMinutes));
                return $data;
            }

            return $this->errorResponse('District not found', $response->status());
        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }

    /**
     * Search districts
     */
    public function searchDistricts($query)
    {
        try {
            $response = Http::timeout($this->timeout)
                ->get("{$this->baseUrl}/districts/search", [
                    'q' => $query,
                ]);

            return $response->successful() ? $response->json() : $this->errorResponse('Search failed');
        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }

    /**
     * Get all villages
     */
    public function getVillages($forceRefresh = false)
    {
        $cacheKey = 'api_villages_all';
        
        if (!$forceRefresh && Cache::has($cacheKey)) {
            return Cache::get($cacheKey);
        }

        try {
            $response = Http::timeout($this->timeout)
                ->get("{$this->baseUrl}/villages");

            if ($response->successful()) {
                $data = $response->json();
                Cache::put($cacheKey, $data, now()->addMinutes($this->cacheMinutes));
                return $data;
            }

            return $this->errorResponse('Failed to fetch villages', $response->status());
        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }

    /**
     * Get single village by ID
     */
    public function getVillage($id)
    {
        $cacheKey = "api_village_{$id}";
        
        if (Cache::has($cacheKey)) {
            return Cache::get($cacheKey);
        }

        try {
            $response = Http::timeout($this->timeout)
                ->get("{$this->baseUrl}/villages/{$id}");

            if ($response->successful()) {
                $data = $response->json();
                Cache::put($cacheKey, $data, now()->addMinutes($this->cacheMinutes));
                return $data;
            }

            return $this->errorResponse('Village not found', $response->status());
        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }

    /**
     * Get villages by district ID
     */
    public function getVillagesByDistrict($districtId)
    {
        $cacheKey = "api_villages_district_{$districtId}";
        
        if (Cache::has($cacheKey)) {
            return Cache::get($cacheKey);
        }

        try {
            $response = Http::timeout($this->timeout)
                ->get("{$this->baseUrl}/districts/{$districtId}/villages");

            if ($response->successful()) {
                $data = $response->json();
                Cache::put($cacheKey, $data, now()->addMinutes($this->cacheMinutes));
                return $data;
            }

            return $this->errorResponse('Villages not found', $response->status());
        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }

    /**
     * Search villages
     */
    public function searchVillages($query)
    {
        try {
            $response = Http::timeout($this->timeout)
                ->get("{$this->baseUrl}/villages/search", [
                    'q' => $query,
                ]);

            return $response->successful() ? $response->json() : $this->errorResponse('Search failed');
        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }

    /**
     * Get all announcements
     */
    public function getAnnouncements($forceRefresh = false)
    {
        $cacheKey = 'api_announcements_all';
        
        if (!$forceRefresh && Cache::has($cacheKey)) {
            return Cache::get($cacheKey);
        }

        try {
            $response = Http::timeout($this->timeout)
                ->get("{$this->baseUrl}/announcements");

            if ($response->successful()) {
                $data = $response->json();
                Cache::put($cacheKey, $data, now()->addMinutes(10)); // Announcements cache 10 menit
                return $data;
            }

            return $this->errorResponse('Failed to fetch announcements', $response->status());
        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }

    /**
     * Get single announcement by ID
     */
    public function getAnnouncement($id)
    {
        $cacheKey = "api_announcement_{$id}";
        
        if (Cache::has($cacheKey)) {
            return Cache::get($cacheKey);
        }

        try {
            $response = Http::timeout($this->timeout)
                ->get("{$this->baseUrl}/announcements/{$id}");

            if ($response->successful()) {
                $data = $response->json();
                Cache::put($cacheKey, $data, now()->addMinutes($this->cacheMinutes));
                return $data;
            }

            return $this->errorResponse('Announcement not found', $response->status());
        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }

    /**
     * Get announcements by village ID
     */
    public function getAnnouncementsByVillage($villageId)
    {
        $cacheKey = "api_announcements_village_{$villageId}";
        
        if (Cache::has($cacheKey)) {
            return Cache::get($cacheKey);
        }

        try {
            $response = Http::timeout($this->timeout)
                ->get("{$this->baseUrl}/villages/{$villageId}/announcements");

            if ($response->successful()) {
                $data = $response->json();
                Cache::put($cacheKey, $data, now()->addMinutes(10));
                return $data;
            }

            return $this->errorResponse('Announcements not found', $response->status());
        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }

    /**
     * Search announcements
     */
    public function searchAnnouncements($query)
    {
        try {
            $response = Http::timeout($this->timeout)
                ->get("{$this->baseUrl}/announcements/search", [
                    'q' => $query,
                ]);

            return $response->successful() ? $response->json() : $this->errorResponse('Search failed');
        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }

    /**
     * Clear all cache
     */
    public function clearCache()
    {
        Cache::forget('api_districts_all');
        Cache::forget('api_villages_all');
        Cache::forget('api_announcements_all');
        return true;
    }

    /**
     * Helper: Create error response
     */
    private function errorResponse($message, $status = 500)
    {
        return [
            'status' => 'error',
            'message' => $message,
            'http_status' => $status,
        ];
    }
}
