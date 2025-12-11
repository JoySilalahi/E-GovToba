# 🚀 Quick Start - Producer-Consumer E-GovToba

## ⚡ Setup Instan (5 Menit)

### 1️⃣ Terminal 1 - Jalankan Producer API (Port 8001)

```powershell
cd "c:\Users\ASUS\Documents\E-GovToba"
php artisan serve --port=8001
```

**Expected output:**
```
Laravel development server started: http://127.0.0.1:8001
```

### 2️⃣ Terminal 2 - Jalankan Consumer App (Port 8000)

```powershell
cd "c:\Users\ASUS\Documents\E-GovToba"
php artisan serve --port=8000
```

**Expected output:**
```
Laravel development server started: http://127.0.0.1:8000
```

### 3️⃣ Terminal 3 - Test API (Optional)

```powershell
# Test Producer API
curl http://localhost:8001/api/v1/districts

# Expected response:
# {
#   "status": "success",
#   "message": "Districts retrieved successfully",
#   "data": [...],
#   "count": 5
# }
```

---

## 📍 Akses Aplikasi

| Aplikasi | URL | Port |
|----------|-----|------|
| **Consumer (Main App)** | http://localhost:8000 | 8000 |
| **Producer API** | http://localhost:8001/api/v1 | 8001 |

---

## 🔧 Konfigurasi (.env)

File `.env` di folder root E-GovToba harus sudah punya:

```env
# Database (Shared)
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_DATABASE=e_govtoba
DB_USERNAME=root
DB_PASSWORD=

# API Configuration (Consumer → Producer)
API_BASE_URL=http://localhost:8001/api/v1
API_TIMEOUT=30
API_CACHE_MINUTES=60
```

---

## 📚 File Penting

| File | Fungsi |
|------|--------|
| `producer-api/app/Models/*.php` | Model untuk query database |
| `producer-api/app/Http/Controllers/Api/*.php` | API Controller (REST endpoints) |
| `producer-api/routes/api.php` | API Routes configuration |
| `app/Services/ApiService.php` | Konsumsi API dari Consumer |
| `app/Http/Controllers/DistrictInformationControllerExample.php` | Contoh implementasi |
| `SETUP_PRODUCER_CONSUMER.md` | Panduan lengkap |

---

## 🧪 Test API Endpoints

### Distrik
```bash
curl http://localhost:8001/api/v1/districts
curl http://localhost:8001/api/v1/districts/1
curl "http://localhost:8001/api/v1/districts/search?q=toba"
```

### Desa/Village
```bash
curl http://localhost:8001/api/v1/villages
curl http://localhost:8001/api/v1/villages/1
curl http://localhost:8001/api/v1/districts/1/villages
```

### Pengumuman
```bash
curl http://localhost:8001/api/v1/announcements
curl http://localhost:8001/api/v1/announcements/1
curl http://localhost:8001/api/v1/villages/1/announcements
```

### Health Check
```bash
curl http://localhost:8001/api/v1/health
```

---

## 💡 Contoh Penggunaan di Controller

### Dari: Akses Database Langsung
```php
public function index() {
    $districts = District::all();
    return view('districts', compact('districts'));
}
```

### Ke: Menggunakan API
```php
use App\Services\ApiService;

public function index(ApiService $api) {
    $response = $api->getDistricts();
    $districts = $response['data'] ?? [];
    return view('districts', compact('districts'));
}
```

Lihat contoh lengkap di:
`app/Http/Controllers/DistrictInformationControllerExample.php`

---

## 🎯 Langkah Update Selanjutnya

1. **Copy Models** yang belum di-copy ke `producer-api/app/Models/`
2. **Update Controllers** di main app untuk menggunakan `ApiService`
3. **Update Views** untuk consume data dari API response
4. **Test** semua endpoints
5. **Clear Cache** jika perlu: `php artisan cache:clear`

---

## ❌ Jika Ada Error

### Error: "Connection refused" / "Cannot reach API"
✅ Solusi:
- Pastikan Producer berjalan di port 8001
- Cek `.env` `API_BASE_URL=http://localhost:8001/api/v1`

### Error: "Database connection error"
✅ Solusi:
- Pastikan database `e_govtoba` sudah ada
- Cek `.env` database credentials benar
- Jalankan: `php artisan migrate`

### Error: "Model not found"
✅ Solusi:
- Pastikan Models sudah di-copy ke `producer-api/app/Models/`
- Jalankan: `composer dump-autoload`

---

## 📞 Need Help?

Baca file dokumentasi:
1. **SETUP_PRODUCER_CONSUMER.md** - Panduan detail step-by-step
2. **STRUCTURE_SUMMARY.md** - Overview struktur file
3. **producer-api/README.md** - Dokumentasi Producer API

---

**Selamat! Setup Producer-Consumer sudah siap! 🎉**

Hubungkan Producer API ke konsumen aplikasi Anda sekarang.
