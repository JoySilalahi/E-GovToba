# 🔐 Sistem Login & Redirect Berdasarkan Role

## Penjelasan Sistem

Sistem E-Gov Toba telah dikonfigurasi untuk **otomatis mengarahkan user ke dashboard yang sesuai** berdasarkan role mereka setelah login.

---

## 📊 Tabel Role & Redirect

| Role | Halaman Setelah Login | Route Name | URL |
|------|----------------------|------------|-----|
| **Admin** | Dashboard Admin | `admin.dashboard` | `/admin/dashboard` |
| **Village Admin** | Dashboard Village Admin | `village-admin.dashboard` | `/village-admin/dashboard` |
| **User Biasa** | Halaman Beranda | `home` | `/` |

---

## 🔄 Cara Kerja Sistem

### 1. **User Login**
User memasukkan email dan password di halaman `/login`

### 2. **Sistem Memeriksa Role**
Sistem memeriksa role user di database (kolom `role` di tabel `users`)

### 3. **Redirect Otomatis**
- ✅ **Jika role = `admin`** → Diarahkan ke `/admin/dashboard`
- ✅ **Jika role = `village_admin`** → Diarahkan ke `/village-admin/dashboard`
- ✅ **Jika role = `staff` atau `user`** → Diarahkan ke halaman beranda `/`

---

## 🧪 Testing Login Berdasarkan Role

### A. Login Sebagai Admin Desa

Pilih salah satu desa untuk testing:

```
Email: baligei@village.admin
Password: password123
```

**Hasil yang diharapkan:**
- ✅ Redirect ke: `http://127.0.0.1:8000/village-admin/dashboard`
- ✅ Tampil dashboard khusus desa Balige I
- ✅ Dapat melihat statistik desa, visi & misi, info kepala desa

### B. Login Sebagai Admin (Super Admin)

```
Email: admin@example.com
Password: password
```

**Hasil yang diharapkan:**
- ✅ Redirect ke: `http://127.0.0.1:8000/admin/dashboard`
- ✅ Tampil dashboard admin kabupaten
- ✅ Dapat mengelola semua desa

### C. Login Sebagai User Biasa

Jika user mendaftar tanpa role admin:

```
Email: user@example.com
Password: password
```

**Hasil yang diharapkan:**
- ✅ Redirect ke: `http://127.0.0.1:8000/` (halaman beranda)
- ✅ Tampil halaman beranda seperti user belum login
- ✅ Navbar berubah menampilkan nama user dan menu logout

---

## 🛡️ Middleware Protection

### Admin Middleware
File: `app/Http/Middleware/AdminMiddleware.php`

Melindungi route admin agar hanya bisa diakses oleh user dengan role `admin`:

```php
if (!auth()->check() || !auth()->user()->isAdmin()) {
    return redirect()->route('home')->with('error', 'Akses ditolak');
}
```

### Village Admin Middleware
File: `app/Http/Middleware/VillageAdminMiddleware.php`

Melindungi route village admin agar hanya bisa diakses oleh user dengan role `village_admin`:

```php
if (!auth()->check() || !auth()->user()->isVillageAdmin()) {
    return redirect()->route('home')->with('error', 'Akses ditolak');
}
```

---

## 📁 File Yang Dimodifikasi

### 1. **AuthenticatedSessionController.php**
File: `app/Http/Controllers/Auth/AuthenticatedSessionController.php`

Method `store()` dimodifikasi untuk cek role dan redirect:

```php
public function store(LoginRequest $request): RedirectResponse
{
    $request->authenticate();
    $request->session()->regenerate();

    $user = Auth::user();
    
    if ($user->isAdmin()) {
        return redirect()->intended(route('admin.dashboard'));
    } elseif ($user->isVillageAdmin()) {
        return redirect()->intended(route('village-admin.dashboard'));
    } else {
        return redirect()->intended(route('home'));
    }
}
```

### 2. **User Model**
File: `app/Models/User.php`

Ditambahkan method helper:

```php
public function isAdmin() {
    return $this->role === 'admin';
}

public function isVillageAdmin() {
    return $this->role === 'village_admin';
}

public function village() {
    return $this->belongsTo(Village::class);
}
```

### 3. **Routes**
File: `routes/web.php`

Ditambahkan route group untuk village admin:

```php
Route::middleware(['auth', 'village-admin'])
    ->prefix('village-admin')
    ->name('village-admin.')
    ->group(function () {
        Route::get('/dashboard', [VillageAdminController::class, 'dashboard']);
        // ... route lainnya
    });
```

---

## 🎯 Fitur Dashboard Village Admin

Dashboard village admin memiliki fitur:

### 1. **Statistik Desa**
- 📊 Total Penduduk
- 🗺️ Luas Wilayah (km²)
- ⏳ Permohonan Pending

### 2. **Visi & Misi**
- ✏️ Edit Visi Desa
- ✏️ Edit Misi Desa
- 💾 Simpan perubahan langsung ke database

### 3. **Informasi Kepala Desa**
- 👤 Nama Kepala Desa
- 📞 Telepon
- ✉️ Email
- 📍 Alamat

### 4. **Menu Cepat**
- 📢 Kelola Pengumuman
- ℹ️ Kelola Informasi
- 💰 Anggaran Desa
- 📈 Laporan

---

## ✅ Checklist Testing

Pastikan semua skenario berikut bekerja:

- [ ] Login dengan admin desa → redirect ke `/village-admin/dashboard`
- [ ] Login dengan super admin → redirect ke `/admin/dashboard`
- [ ] Login dengan user biasa → redirect ke `/` (home)
- [ ] User biasa tidak bisa akses `/village-admin/dashboard` (redirect ke home)
- [ ] User biasa tidak bisa akses `/admin/dashboard` (redirect ke home)
- [ ] Village admin tidak bisa akses dashboard admin lain (hanya desanya sendiri)
- [ ] Logout bekerja dari semua role
- [ ] Navbar menampilkan nama user setelah login

---

## 🔧 Troubleshooting

### Masalah: Redirect tidak bekerja

**Solusi:**
```bash
php artisan route:clear
php artisan cache:clear
php artisan config:clear
```

### Masalah: Error "route not defined"

**Solusi:**
Pastikan route sudah terdaftar:
```bash
php artisan route:list
```

### Masalah: Middleware tidak bekerja

**Solusi:**
Cek `bootstrap/app.php` pastikan middleware sudah didaftarkan:
```php
$middleware->alias([
    'admin' => \App\Http\Middleware\AdminMiddleware::class,
    'village-admin' => \App\Http\Middleware\VillageAdminMiddleware::class,
]);
```

---

## 📝 Catatan Pengembangan Selanjutnya

1. ✅ Sistem redirect berdasarkan role sudah selesai
2. ✅ Dashboard village admin sudah dibuat
3. ✅ Middleware protection sudah aktif
4. 🔄 Dashboard admin kabupaten (perlu controller lengkap)
5. 🔄 Fitur kelola pengumuman
6. 🔄 Fitur kelola informasi desa
7. 🔄 Fitur anggaran desa
8. 🔄 Sistem laporan

---

**Dibuat:** 6 November 2025  
**Sistem:** E-Gov Toba  
**Versi:** 1.0
