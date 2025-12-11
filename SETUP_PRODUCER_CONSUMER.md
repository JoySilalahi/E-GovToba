# Panduan Setup Producer-Consumer Architecture E-GovToba

## 📋 Daftar Isi
1. [Struktur Proyek](#struktur-proyek)
2. [Setup Producer API](#setup-producer-api)
3. [Setup Consumer (Main App)](#setup-consumer-main-app)
4. [Testing](#testing)
5. [Troubleshooting](#troubleshooting)

---

## 🏗️ Struktur Proyek

```
E-GovToba/
├── app/                          # Main Application (Consumer)
│   ├── Models/
│   ├── Http/Controllers/
│   ├── Services/
│   │   └── ApiService.php       # ⭐ Baru - Komunikasi ke Producer
│   └── ...
├── config/
│   └── api.php                  # ⭐ Baru - API Configuration
├── routes/
│   └── web.php                  # Main Web Routes
├── resources/
│   └── views/
├── producer-api/                # ⭐ BARU - Folder Producer
│   ├── app/
│   │   ├── Models/             # Copy dari Main App
│   │   └── Http/
│   │       └── Controllers/
│   │           └── Api/        # API Controllers
│   ├── routes/
│   │   └── api.php             # API Routes
│   ├── .env.example
│   └── README.md
├── .env                         # Main App Config
└── composer.json
```

---

## 🚀 Setup Producer API

### Step 1: Copy Models ke Producer

Producer memerlukan Models untuk queries. Copy file dari `app/Models/` ke `producer-api/app/Models/`:

```bash
# Pastikan folder ada
mkdir -Force "producer-api/app/Models"

# Copy models yang sudah disiapkan
# File sudah ada di:
# - producer-api/app/Models/District.php
# - producer-api/app/Models/Village.php
# - producer-api/app/Models/Announcement.php
# - producer-api/app/Models/User.php
```

### Step 2: Hubungkan Database

Buka file `.env` di **project utama** E-GovToba dan catat:
```
DB_HOST=127.0.0.1
DB_DATABASE=e_govtoba
DB_USERNAME=root
DB_PASSWORD=...
```

Producer akan **menggunakan database yang sama**. Pastikan di `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=e_govtoba
DB_USERNAME=root
DB_PASSWORD=
```

### Step 3: Setup Producer sebagai API Server

Di file `producer-api/routes/api.php`, endpoints sudah dikonfigurasi:

```php
// Endpoints Available:
GET    /api/v1/districts
GET    /api/v1/districts/{id}
GET    /api/v1/districts/search?q=query
GET    /api/v1/villages
GET    /api/v1/villages/{id}
GET    /api/v1/districts/{districtId}/villages
GET    /api/v1/announcements
GET    /api/v1/announcements/{id}
GET    /api/v1/villages/{villageId}/announcements
```

### Step 4: Jalankan Producer API

```bash
# Di terminal, masuk ke folder project utama
cd c:\Users\ASUS\Documents\E-GovToba

# Jalankan Producer di port 8001
php artisan serve --port=8001
```

**Output expected:**
```
Laravel development server started: http://127.0.0.1:8001
```

Biarkan terminal ini terbuka.

---

## 🔌 Setup Consumer (Main App)

### Step 1: Konfigurasi .env di Project Utama

Buka `.env` di project utama dan tambahkan konfigurasi API:

```env
# API Configuration
API_BASE_URL=http://localhost:8001/api/v1
API_TIMEOUT=30
API_CACHE_MINUTES=60
```

### Step 2: ApiService Sudah Siap

File `app/Services/ApiService.php` sudah dibuat dengan methods:

```php
// Contoh penggunaan di Controller:
class ExampleController extends Controller {
    public function __construct(ApiService $apiService) {
        $this->apiService = $apiService;
    }
    
    public function example() {
        $districts = $this->apiService->getDistricts();
        // ...
    }
}
```

### Step 3: Update Controller Anda

**SEBELUM** (Mengakses database langsung):
```php
public function index() {
    $districts = District::all();
    return view('districts', compact('districts'));
}
```

**SESUDAH** (Menggunakan API):
```php
public function index(ApiService $api) {
    $response = $api->getDistricts();
    $districts = $response['data'] ?? [];
    return view('districts', compact('districts'));
}
```

Lihat contoh lengkap di:
`app/Http/Controllers/DistrictInformationControllerExample.php`

### Step 4: Jalankan Main App (Consumer)

**Di terminal baru**, jalankan:
```bash
# Di folder E-GovToba
php artisan serve --port=8000
```

Sekarang Anda punya:
- **Consumer (Main App)**: http://localhost:8000
- **Producer (API)**: http://localhost:8001

---

## 🧪 Testing

### Test 1: Verifikasi Producer API Berjalan

```bash
# Terminal baru
curl http://localhost:8001/api/v1/districts
```

**Expected response:**
```json
{
  "status": "success",
  "message": "Districts retrieved successfully",
  "data": [ /* data districts */ ],
  "count": 5
}
```

### Test 2: Verifikasi Consumer Bisa Akses API

```bash
# Buka browser
http://localhost:8000/districts
```

Jika tidak ada error, berarti API berjalan dengan baik.

### Test 3: Test Cache

```php
// Di Tinker
php artisan tinker
> app(ApiService::class)->getDistricts(true) // force refresh
> app(ApiService::class)->getDistricts()     // pakai cache
```

---

## 🔧 API Response Format

Semua endpoint mengembalikan format JSON yang konsisten:

### Success Response (200)
```json
{
  "status": "success",
  "message": "Data retrieved successfully",
  "data": { /* actual data */ },
  "count": 10
}
```

### Error Response (400/404/500)
```json
{
  "status": "error",
  "message": "Error description",
  "error": "Exception details"
}
```

---

## 📊 Data Flow Diagram

```
┌─────────────────────────────┐
│  Browser Request            │
│  GET /districts             │
└──────────────┬──────────────┘
               │
               ▼
┌─────────────────────────────┐
│  Consumer (Main App)        │
│  Port 8000                  │
│  - web.php Routes           │
│  - Controllers              │
│  - Views (Blade)            │
└──────────────┬──────────────┘
               │ (HTTP Request via ApiService)
               ▼
┌─────────────────────────────┐
│  Producer (API Server)      │
│  Port 8001                  │
│  - api.php Routes           │
│  - Api/Controllers          │
│  - Models                   │
└──────────────┬──────────────┘
               │ (Query)
               ▼
┌─────────────────────────────┐
│  Database (Shared)          │
│  e_govtoba                  │
└─────────────────────────────┘
```

---

## ❌ Troubleshooting

### Problem: API tidak terkoneksi

**Solusi:**
1. Pastikan Producer berjalan di port 8001
2. Cek `.env` API_BASE_URL benar
3. Cek firewall tidak memblokir localhost

### Problem: 404 Not Found

**Solusi:**
1. Pastikan routes di `producer-api/routes/api.php` benar
2. Cek naming convention endpoint

### Problem: Database connection error

**Solusi:**
1. Pastikan database credentials di `.env` benar
2. Pastikan database sudah dibuat: `e_govtoba`
3. Jalankan migration: `php artisan migrate`

### Problem: Cache tidak clear

**Solusi:**
```bash
php artisan cache:clear
php artisan config:cache
```

---

## 📝 Checklist Implementasi

- [ ] Folder `producer-api` sudah dibuat
- [ ] Models sudah di-copy ke `producer-api/app/Models/`
- [ ] `.env` Consumer sudah dikonfigurasi dengan `API_BASE_URL`
- [ ] Producer berjalan di port 8001
- [ ] Consumer berjalan di port 8000
- [ ] Bisa akses `/api/v1/districts` dari browser
- [ ] Controllers sudah di-update menggunakan ApiService
- [ ] Views sudah di-update untuk consume data dari API
- [ ] Cache sudah di-clear
- [ ] Testing semua endpoint berhasil

---

## 🎯 Next Steps

1. **Update semua Controllers** yang butuh data dari Producer
2. **Update semua Views** untuk consume API response
3. **Implementasi Error Handling** yang lebih baik
4. **Setup Logging** untuk monitoring
5. **Performance Testing** dengan banyak requests
6. **Production Deployment** dengan proper config
