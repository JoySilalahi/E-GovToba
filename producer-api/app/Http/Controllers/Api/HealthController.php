<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Health Check Controller
 * 
 * Digunakan untuk monitoring API status
 */
class HealthController extends Controller
{
    /**
     * Get API health status
     */
    public function check()
    {
        try {
            // Test database connection
            \DB::connection()->getPdo();
            $dbHealthy = true;
        } catch (\Exception $e) {
            $dbHealthy = false;
        }

        $status = $dbHealthy ? 'healthy' : 'degraded';

        return response()->json([
            'status' => $status,
            'api' => 'E-GovToba Producer API',
            'version' => '1.0.0',
            'database' => $dbHealthy ? 'connected' : 'disconnected',
            'timestamp' => now()->toIso8601String(),
            'uptime' => round(microtime(true) - $_SERVER['REQUEST_TIME_FLOAT'], 2) . 's',
        ], $dbHealthy ? 200 : 503);
    }
}
