# E-GovToba Producer API

API Server untuk E-GovToba yang menyediakan endpoints REST untuk mengkonsumsi data.

## 📋 Struktur

```
producer-api/
├── app/
│   ├── Models/              # Model dari project utama (copy)
│   └── Http/
│       └── Controllers/
│           └── Api/         # API Controllers
├── routes/
│   └── api.php             # API Routes
├── config/                 # Konfigurasi tambahan
└── database/
    └── migrations/         # Migration files (reference only)
```

## 🚀 Setup

1. Ensure `.env` di project utama menunjuk ke database yang benar
2. Copy Models dari `app/Models/` ke `producer-api/app/Models/`
3. Buat API Controllers
4. Setup routes di `routes/api.php`

## 📡 Endpoints

### Districts
- `GET /api/districts` - Daftar semua district
- `GET /api/districts/{id}` - Detail district

### Villages
- `GET /api/villages` - Daftar semua village
- `GET /api/villages/{id}` - Detail village
- `GET /api/districts/{districtId}/villages` - Villages by district

### Announcements
- `GET /api/announcements` - Daftar pengumuman
- `GET /api/announcements/{id}` - Detail pengumuman

### Users
- `GET /api/users` - Daftar user
- `POST /api/login` - Login dengan token

## 🔐 Authentication

Gunakan Sanctum Token untuk API authentication:
```php
Route::middleware('auth:sanctum')->group(function () {
    // Protected routes
});
```

## 🧪 Testing

```bash
# Test endpoint
curl http://localhost:8001/api/districts

# Dengan token
curl -H "Authorization: Bearer TOKEN" http://localhost:8001/api/districts
```
