# 🔐 Setup Google OAuth Login

## Panduan Lengkap Login dengan Google

Sistem E-Gov Toba sekarang sudah mendukung **Login dengan Google**. User yang login melalui Google akan otomatis diarahkan ke **Dashboard User (Halaman Beranda)**.

---

## 📋 Cara Setup Google OAuth

### Step 1: Buat Project di Google Cloud Console

1. **Buka Google Cloud Console**
   - URL: https://console.cloud.google.com/

2. **Buat Project Baru**
   - Klik "Select a project" → "New Project"
   - Nama project: `E-Gov Toba`
   - Klik "Create"

3. **Enable Google+ API**
   - Di sidebar, pilih "APIs & Services" → "Library"
   - Cari "Google+ API" atau "Google Identity"
   - Klik "Enable"

### Step 2: Buat OAuth 2.0 Credentials

1. **Pergi ke Credentials**
   - Sidebar → "APIs & Services" → "Credentials"

2. **Configure OAuth Consent Screen**
   - Klik tab "OAuth consent screen"
   - User Type: Pilih "External"
   - Klik "Create"
   - Isi informasi:
     - App name: `E-Gov Toba`
     - User support email: `your-email@example.com`
     - Developer contact: `your-email@example.com`
   - Klik "Save and Continue"
   - Scopes: Skip (klik "Save and Continue")
   - Test users: Tambahkan email untuk testing
   - Klik "Save and Continue"

3. **Buat OAuth 2.0 Client ID**
   - Kembali ke tab "Credentials"
   - Klik "Create Credentials" → "OAuth client ID"
   - Application type: `Web application`
   - Name: `E-Gov Toba Web Client`
   - Authorized JavaScript origins:
     ```
     http://localhost:8000
     http://127.0.0.1:8000
     ```
   - Authorized redirect URIs:
     ```
     http://localhost:8000/auth/google/callback
     http://127.0.0.1:8000/auth/google/callback
     ```
   - Klik "Create"

4. **Copy Credentials**
   - Setelah dibuat, akan muncul popup dengan:
     - **Client ID**: `xxxxx.apps.googleusercontent.com`
     - **Client Secret**: `xxxxxxxxxxxx`
   - Copy kedua nilai ini!

### Step 3: Update File `.env`

Buka file `.env` di root project dan update nilai berikut:

```env
GOOGLE_CLIENT_ID=your-client-id-here.apps.googleusercontent.com
GOOGLE_CLIENT_SECRET=your-client-secret-here
GOOGLE_REDIRECT_URI=http://127.0.0.1:8000/auth/google/callback
```

**Ganti:**
- `your-client-id-here` dengan Client ID yang di-copy
- `your-client-secret-here` dengan Client Secret yang di-copy

### Step 4: Clear Cache dan Test

```bash
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan serve
```

---

## 🧪 Testing Login Google

### 1. Buka Halaman Login
```
http://127.0.0.1:8000/login
```

### 2. Klik Tombol "Masuk dengan Google"
- Tombol dengan logo Google ada di bawah form login biasa
- Ada pemisah "atau" di tengah

### 3. Pilih Akun Google
- Browser akan redirect ke Google
- Pilih akun Google yang ingin digunakan
- Klik "Allow" untuk memberikan permission

### 4. Redirect Otomatis
- ✅ Setelah berhasil, akan redirect ke halaman beranda
- ✅ User otomatis ter-register dengan role `staff` (user biasa)
- ✅ Navbar akan menampilkan nama user dan tombol logout
- ✅ User bisa langsung menggunakan fitur-fitur user

---

## 🔄 Alur Login Google

```
┌─────────────────┐
│ User klik       │
│ "Login Google"  │
└────────┬────────┘
         │
         ▼
┌─────────────────┐
│ Redirect ke     │
│ Google OAuth    │
└────────┬────────┘
         │
         ▼
┌─────────────────┐
│ User pilih      │
│ akun Google     │
└────────┬────────┘
         │
         ▼
┌─────────────────┐
│ Google callback │
│ dengan data     │
└────────┬────────┘
         │
         ▼
┌─────────────────┐
│ Cek email di DB │
└────────┬────────┘
         │
    ┌────┴────┐
    │         │
    ▼         ▼
┌───────┐ ┌───────────┐
│ Sudah │ │ Belum ada │
│ ada   │ │           │
└───┬───┘ └─────┬─────┘
    │           │
    │           ▼
    │     ┌──────────────┐
    │     │ Buat user    │
    │     │ baru dengan  │
    │     │ role: staff  │
    │     └──────┬───────┘
    │            │
    └─────┬──────┘
          │
          ▼
    ┌──────────┐
    │ Login    │
    │ user     │
    └────┬─────┘
         │
         ▼
    ┌──────────┐
    │ Redirect │
    │ ke HOME  │
    └──────────┘
```

---

## 📊 Perbedaan Login Biasa vs Google

| Aspek | Login Biasa | Login Google |
|-------|-------------|--------------|
| **Email & Password** | Dibutuhkan | Tidak perlu (otomatis) |
| **Registrasi** | Manual di form register | Otomatis saat login pertama |
| **Email Verification** | Perlu verifikasi | Otomatis verified |
| **Role Default** | `staff` | `staff` (user biasa) |
| **Redirect Setelah Login** | Home (beranda) | Home (beranda) |
| **Password di Database** | Password user | Random (tidak digunakan) |

---

## 🔒 Keamanan

### 1. **User Google Selalu Role `staff`**
```php
'role' => 'staff', // Default role untuk user Google
```

Artinya user yang login via Google:
- ❌ **TIDAK** bisa akses `/admin/dashboard`
- ❌ **TIDAK** bisa akses `/village-admin/dashboard`
- ✅ Hanya bisa akses halaman beranda dan fitur user biasa

### 2. **Password Acak**
User yang login via Google memiliki password random:
```php
'password' => bcrypt(Str::random(16))
```

Artinya:
- User tidak bisa login dengan email + password biasa
- User **harus** selalu login via Google button
- Lebih aman karena menggunakan OAuth Google

### 3. **Email Verified Otomatis**
```php
'email_verified_at' => now()
```

User Google langsung ter-verifikasi karena Google sudah memverifikasi email mereka.

---

## 🛡️ Middleware Protection

User Google tetap terlindungi oleh middleware:

```php
// AdminMiddleware.php
if (!auth()->user()->isAdmin()) {
    return redirect()->route('home');
}

// VillageAdminMiddleware.php
if (!auth()->user()->isVillageAdmin()) {
    return redirect()->route('home');
}
```

Jadi meskipun user login via Google, mereka tetap tidak bisa akses dashboard admin.

---

## 🌐 Routes Google OAuth

### 1. Redirect ke Google
```
GET /auth/google
Route name: auth.google
```

### 2. Callback dari Google
```
GET /auth/google/callback
Route name: auth.google.callback
```

---

## 🎨 Tampilan Tombol Login Google

Tombol "Masuk dengan Google" memiliki:
- ✅ Logo Google official colors
- ✅ Hover effect (border biru + shadow)
- ✅ Responsive design
- ✅ Pemisah "atau" dengan garis horizontal

---

## 🔧 Troubleshooting

### Error: "redirect_uri_mismatch"

**Penyebab:** URL callback di Google Console tidak match dengan URL di aplikasi

**Solusi:**
1. Cek URL di Google Console Credentials
2. Pastikan ada:
   ```
   http://127.0.0.1:8000/auth/google/callback
   ```
3. Pastikan `.env` sudah benar:
   ```
   GOOGLE_REDIRECT_URI=http://127.0.0.1:8000/auth/google/callback
   ```
4. Clear config:
   ```bash
   php artisan config:clear
   ```

### Error: "Client ID not found"

**Penyebab:** Credentials belum diisi di `.env`

**Solusi:**
1. Buka `.env`
2. Isi `GOOGLE_CLIENT_ID` dan `GOOGLE_CLIENT_SECRET`
3. Clear config:
   ```bash
   php artisan config:clear
   ```

### User tidak ter-redirect setelah login

**Penyebab:** Route cache atau session issue

**Solusi:**
```bash
php artisan route:clear
php artisan cache:clear
php artisan config:clear
```

### Error: "This app isn't verified"

**Penyebab:** OAuth consent screen belum di-publish

**Solusi:**
1. Untuk development, cukup tambahkan email testing di Google Console
2. Klik "Continue" saat muncul warning
3. Untuk production, submit app untuk review di Google

---

## 📝 File Yang Dibuat/Dimodifikasi

### 1. **GoogleAuthController.php**
File: `app/Http/Controllers/Auth/GoogleAuthController.php`

Handles:
- Redirect ke Google
- Handle callback dari Google
- Create/login user
- Redirect ke home

### 2. **routes/auth.php**
Ditambahkan:
```php
Route::get('auth/google', [GoogleAuthController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleAuthController::class, 'handleGoogleCallback']);
```

### 3. **resources/views/auth/login.blade.php**
Ditambahkan:
- Divider "atau"
- Tombol "Masuk dengan Google" dengan logo
- Hover effects

### 4. **.env**
Ditambahkan:
```env
GOOGLE_CLIENT_ID=
GOOGLE_CLIENT_SECRET=
GOOGLE_REDIRECT_URI=
```

### 5. **config/services.php**
Ditambahkan:
```php
'google' => [
    'client_id' => env('GOOGLE_CLIENT_ID'),
    'client_secret' => env('GOOGLE_CLIENT_SECRET'),
    'redirect' => env('GOOGLE_REDIRECT_URI'),
],
```

---

## ✅ Checklist Setup

- [ ] Install Laravel Socialite (`composer require laravel/socialite`)
- [ ] Buat project di Google Cloud Console
- [ ] Enable Google+ API
- [ ] Buat OAuth 2.0 Credentials
- [ ] Copy Client ID dan Client Secret
- [ ] Update `.env` dengan credentials
- [ ] Clear config cache
- [ ] Test tombol "Login dengan Google"
- [ ] Verify redirect ke home setelah login
- [ ] Cek user tersimpan di database dengan role `staff`

---

## 🎯 Next Steps (Optional)

1. **Avatar Google**
   - Simpan foto profil dari Google
   - Tampilkan di navbar

2. **Sync Data Google**
   - Update nama jika berubah di Google
   - Sync email jika berubah

3. **Multiple OAuth Providers**
   - Facebook Login
   - GitHub Login
   - Microsoft Login

4. **Link/Unlink Account**
   - User bisa link Google ke akun existing
   - User bisa unlink Google account

---

**Setup Date:** 6 November 2025  
**Package:** Laravel Socialite v5.23  
**OAuth Provider:** Google  
**Redirect After Login:** Home (Beranda User)
