<?php

return [
    /*
    |--------------------------------------------------------------------------
    | API Configuration
    |--------------------------------------------------------------------------
    |
    | Konfigurasi untuk komunikasi dengan Producer API
    |
    */

    'api' => [
        'base_url' => env('API_BASE_URL', 'http://localhost:8001/api/v1'),
        'timeout' => env('API_TIMEOUT', 30),
        'cache_minutes' => env('API_CACHE_MINUTES', 60),
    ],
];
