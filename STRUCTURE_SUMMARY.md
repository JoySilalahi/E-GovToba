# File Structure & Changes Summary

## 📁 Struktur File yang Dibuat

### Producer API Folder (`producer-api/`)
```
producer-api/
├── app/
│   ├── Models/
│   │   ├── District.php          ✅ NEW
│   │   ├── Village.php           ✅ NEW
│   │   ├── Announcement.php      ✅ NEW
│   │   └── User.php              ✅ NEW
│   └── Http/
│       └── Controllers/
│           └── Api/
│               ├── DistrictController.php      ✅ NEW
│               ├── VillageController.php       ✅ NEW
│               ├── AnnouncementController.php  ✅ NEW
│               └── HealthController.php        ✅ NEW
├── routes/
│   └── api.php                   ✅ NEW
├── .env.example                  ✅ NEW
└── README.md                     ✅ NEW
```

### Main Application Updates
```
app/
└── Services/
    └── ApiService.php            ✅ NEW (Komunikasi ke Producer)

config/
└── api.php                       ✅ NEW (API Configuration)

app/Http/Controllers/
└── DistrictInformationControllerExample.php  ✅ NEW (Contoh implementasi)
```

### Documentation
```
SETUP_PRODUCER_CONSUMER.md       ✅ NEW (Panduan lengkap)
setup.sh                         ✅ NEW (Setup script)
producer-api/README.md           ✅ NEW (Producer API doc)
```

---

## 🔄 Alur Kerja

### 1. Producer API (Menyediakan Data)

**File**: `producer-api/app/Http/Controllers/Api/*.php`

```
Request ke /api/v1/districts
    ↓
DistrictController@index
    ↓
Query: District::with('villages')->get()
    ↓
JSON Response
```

### 2. ApiService (Konsumsi API)

**File**: `app/Services/ApiService.php`

```
Controller meminta data
    ↓
ApiService->getDistricts()
    ↓
Http::get('http://localhost:8001/api/v1/districts')
    ↓
Cache hasil (60 menit default)
    ↓
Return data
```

### 3. Consumer Controllers (Menampilkan Data)

**File**: `app/Http/Controllers/DistrictInformationControllerExample.php`

```
User akses /districts
    ↓
DistrictController@index
    ↓
ApiService->getDistricts()
    ↓
View('districts', compact('districts'))
    ↓
HTML Response
```

---

## 🚀 Environment Variables

### Producer API (.env di root E-GovToba atau producer-api/)
```env
APP_NAME="E-GovToba Producer API"
APP_PORT=8001
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_DATABASE=e_govtoba
DB_USERNAME=root
DB_PASSWORD=
```

### Consumer App (.env di root E-GovToba)
```env
APP_NAME="E-GovToba"
APP_PORT=8000
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_DATABASE=e_govtoba
DB_USERNAME=root
DB_PASSWORD=

# API Configuration
API_BASE_URL=http://localhost:8001/api/v1
API_TIMEOUT=30
API_CACHE_MINUTES=60
```

---

## 📡 API Endpoints

### Districts
```
GET    /api/v1/districts              → Semua district
GET    /api/v1/districts/{id}         → Detail district
GET    /api/v1/districts/search?q=    → Search district
```

### Villages
```
GET    /api/v1/villages               → Semua village
GET    /api/v1/villages/{id}          → Detail village
GET    /api/v1/districts/{id}/villages → Villages by district
GET    /api/v1/villages/search?q=     → Search village
```

### Announcements
```
GET    /api/v1/announcements          → Semua announcement
GET    /api/v1/announcements/{id}     → Detail announcement
GET    /api/v1/villages/{id}/announcements → Announcements by village
GET    /api/v1/announcements/search?q= → Search announcement
```

### Health Check
```
GET    /api/v1/health                 → API Status
```

---

## 🔐 Caching Strategy

### Cache Duration
- **Districts/Villages**: 60 menit (default)
- **Announcements**: 10 menit (lebih sering berubah)
- **Search results**: Tidak di-cache

### Clear Cache
```bash
php artisan cache:clear
```

Atau programatically:
```php
app(ApiService::class)->clearCache();
```

---

## 🧪 Testing Endpoints

### Via cURL
```bash
# Get all districts
curl http://localhost:8001/api/v1/districts

# Get specific district
curl http://localhost:8001/api/v1/districts/1

# Search
curl "http://localhost:8001/api/v1/districts/search?q=toba"

# Health check
curl http://localhost:8001/api/v1/health
```

### Via Browser
```
http://localhost:8001/api/v1/districts
http://localhost:8001/api/v1/villages
http://localhost:8001/api/v1/announcements
```

---

## ✅ Keunggulan Implementasi Ini

1. **Separation of Concerns**
   - Backend (API) terpisah dari Frontend (Web)
   - Mudah maintenance dan scaling

2. **Code Reusability**
   - API bisa digunakan oleh multiple clients (web, mobile, dll)

3. **Performance**
   - Caching built-in
   - Request timeout protection
   - Error handling yang robust

4. **Scalability**
   - Producer dan Consumer bisa di-scale independently
   - Database connection pooling

5. **Best Practices**
   - RESTful API design
   - Standard JSON response format
   - Proper HTTP status codes
   - Error handling & logging

---

## ⚙️ Konfigurasi Tambahan (Optional)

### Untuk Production

1. **CORS Configuration** (jika API diakses dari domain lain)
   ```php
   // config/cors.php
   'allowed_origins' => ['http://localhost:8000', 'https://yourdomain.com'],
   ```

2. **Rate Limiting**
   ```php
   // routes/api.php
   Route::middleware('throttle:60,1')->group(function () {
       // Protected routes
   });
   ```

3. **Authentication** (Jika perlu)
   ```php
   Route::middleware('auth:sanctum')->group(function () {
       // Protected routes
   });
   ```

4. **Logging**
   ```php
   // config/logging.php
   'channels' => [
       'api' => [
           'driver' => 'stack',
           'channels' => ['single'],
       ],
   ],
   ```

---

## 📝 Checklist Implementasi

- [x] Folder struktur dibuat
- [x] Producer Models dibuat
- [x] Producer Controllers dibuat
- [x] Producer Routes dikonfigurasi
- [x] ApiService dibuat (untuk Consumer)
- [x] Config API dibuat
- [x] Contoh Controller dibuat
- [x] Dokumentasi lengkap dibuat
- [ ] Testing semua endpoints
- [ ] Update existing controllers
- [ ] Update existing views
- [ ] Production deployment

---

## 🆘 Support & Questions

Jika ada pertanyaan tentang:
- Setup Producer API
- Integrasi ApiService
- Update controllers & views
- Performance tuning
- Error handling

Lihat file:
1. `SETUP_PRODUCER_CONSUMER.md` - Panduan lengkap
2. `producer-api/README.md` - Dokumentasi API
3. `app/Http/Controllers/DistrictInformationControllerExample.php` - Contoh implementasi
