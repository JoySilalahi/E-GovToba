# 🔧 Command Reference Guide

Kumpulan command penting untuk development Producer-Consumer E-GovToba

---

## ⚡ Quick Commands

### Start Development Environment

```powershell
# Terminal 1 - Producer API (Port 8001)
cd "c:\Users\ASUS\Documents\E-GovToba"
php artisan serve --port=8001

# Terminal 2 - Consumer App (Port 8000)
cd "c:\Users\ASUS\Documents\E-GovToba"
php artisan serve --port=8000

# Terminal 3 - Test (Optional)
curl http://localhost:8001/api/v1/districts
```

---

## 🛠️ Setup & Installation

### First Time Setup

```bash
# Install dependencies
composer install

# Generate app key
php artisan key:generate

# Setup environment
cp .env.example .env

# Run migrations
php artisan migrate

# Clear cache
php artisan cache:clear
php artisan config:cache
```

### Setup Producer API Folder

```powershell
# Create structure
mkdir -Force "producer-api/app/Models"
mkdir -Force "producer-api/app/Http/Controllers/Api"
mkdir -Force "producer-api/routes"

# Models sudah dibuat di:
# - producer-api/app/Models/District.php
# - producer-api/app/Models/Village.php
# - producer-api/app/Models/Announcement.php
# - producer-api/app/Models/User.php

# Controllers sudah dibuat di:
# - producer-api/app/Http/Controllers/Api/DistrictController.php
# - producer-api/app/Http/Controllers/Api/VillageController.php
# - producer-api/app/Http/Controllers/Api/AnnouncementController.php
# - producer-api/app/Http/Controllers/Api/HealthController.php

# Routes sudah di-setup di:
# - producer-api/routes/api.php
```

---

## 🚀 Running Applications

### Producer API Server

```bash
# Port 8001 - API only
php artisan serve --port=8001

# With specific host
php artisan serve --host=127.0.0.1 --port=8001

# Background process (Windows)
Start-Process -WindowStyle Hidden powershell {cd "c:\Users\ASUS\Documents\E-GovToba"; php artisan serve --port=8001}
```

### Consumer Main App

```bash
# Port 8000 - Web app with views
php artisan serve --port=8000

# With specific host
php artisan serve --host=127.0.0.1 --port=8000
```

### Both in Parallel (Windows PowerShell)

```powershell
# Terminal 1
cmd /c "cd c:\Users\ASUS\Documents\E-GovToba && php artisan serve --port=8001"

# Terminal 2 (New)
cmd /c "cd c:\Users\ASUS\Documents\E-GovToba && php artisan serve --port=8000"

# Terminal 3 (Optional - Test)
Invoke-WebRequest http://localhost:8001/api/v1/health
```

---

## 🧪 Testing Endpoints

### Using cURL

```bash
# Districts API
curl http://localhost:8001/api/v1/districts
curl http://localhost:8001/api/v1/districts/1
curl "http://localhost:8001/api/v1/districts/search?q=toba"

# Villages API
curl http://localhost:8001/api/v1/villages
curl http://localhost:8001/api/v1/villages/1
curl http://localhost:8001/api/v1/districts/1/villages

# Announcements API
curl http://localhost:8001/api/v1/announcements
curl http://localhost:8001/api/v1/announcements/1
curl http://localhost:8001/api/v1/villages/1/announcements

# Health Check
curl http://localhost:8001/api/v1/health
```

### Using PowerShell

```powershell
# Invoke-WebRequest
Invoke-WebRequest -Uri "http://localhost:8001/api/v1/districts" | ConvertTo-Json

# Fetch JSON
(Invoke-WebRequest -Uri "http://localhost:8001/api/v1/districts" -UseBasicParsing).Content | ConvertFrom-Json

# Pretty print
(Invoke-WebRequest -Uri "http://localhost:8001/api/v1/districts" -UseBasicParsing).Content | ConvertFrom-Json | ConvertTo-Json -Depth 10
```

### Using Browser

```
http://localhost:8001/api/v1/districts
http://localhost:8001/api/v1/villages
http://localhost:8001/api/v1/announcements
http://localhost:8001/api/v1/health

# Consumer
http://localhost:8000/districts
http://localhost:8000/villages
```

---

## 💾 Database Commands

### Migrations

```bash
# Run all migrations
php artisan migrate

# Force run (production warning)
php artisan migrate --force

# Rollback last batch
php artisan migrate:rollback

# Rollback specific migration
php artisan migrate:reset

# Refresh (rollback + migrate)
php artisan migrate:refresh

# Create new migration
php artisan make:migration create_table_name

# Create new seeder
php artisan make:seeder SeederName
```

### Database Utilities

```bash
# Access Tinker REPL
php artisan tinker

# In Tinker:
> App\Models\District::all()
> App\Models\Village::all()
> App\Models\Announcement::all()

# Test ApiService in Tinker
> app(App\Services\ApiService::class)->getDistricts()
> app(App\Services\ApiService::class)->getVillages()
```

---

## 🗑️ Cache Management

### Clear Cache

```bash
# Clear all cache
php artisan cache:clear

# Clear config cache
php artisan config:cache

# Clear route cache
php artisan route:cache

# Clear view cache
php artisan view:clear

# Clear all at once
php artisan cache:clear && php artisan config:cache && php artisan view:clear
```

### Cache in Code

```php
// In Tinker or code:

// Get cached data
$api = app(ApiService::class);

// Get with cache
$districts = $api->getDistricts();

// Force refresh (ignore cache)
$districts = $api->getDistricts(forceRefresh: true);

// Clear all API cache
$api->clearCache();

// Check specific cache
Cache::has('api_districts_all') ? 'Cached' : 'Not cached'

// Get from cache
Cache::get('api_districts_all')

// Forget specific cache
Cache::forget('api_districts_all')
```

---

## 📝 Log Management

### View Logs

```bash
# Real-time log (tail)
tail -f storage/logs/laravel.log

# Windows PowerShell
Get-Content storage/logs/laravel.log -Wait

# View last 50 lines
tail -n 50 storage/logs/laravel.log

# Search logs for error
grep -i "error" storage/logs/laravel.log
```

### Log Configuration

```bash
# In .env
LOG_CHANNEL=stack
LOG_LEVEL=debug

# Available levels: emergency, alert, critical, error, warning, notice, info, debug
```

---

## 🔍 Debugging

### Tinker REPL

```bash
php artisan tinker
```

```php
# Inside Tinker:

# List districts
District::all();

# Find by ID
District::find(1);

# Get with relations
District::with('villages')->first();

# Count records
District::count();

# Test API Service
app(ApiService::class)->getDistricts();

# Check cache
Cache::all();

# Exit
exit or Ctrl+D
```

### Debug Mode

```env
# In .env
APP_DEBUG=true   # Enable detailed errors

# Disable in production
APP_DEBUG=false
```

### Log in Code

```php
// Debug output
dd($variable);  // Die and dump

// Dump without die
dump($variable);

// Log to file
Log::info('Message', ['data' => $value]);
Log::debug('Debug message');
Log::error('Error occurred', ['exception' => $e]);
```

---

## 🔐 Security Commands

### Generate Keys

```bash
# Generate app key
php artisan key:generate

# Generate API token (for Sanctum)
php artisan passport:install

# Generate personal access token
php artisan passport:client --personal
```

### Permission Management

```bash
# Set storage permissions
chmod -R 775 storage bootstrap/cache

# Windows (Run as Administrator)
icacls "storage" /grant:r "%USERNAME%:(OI)(CI)F" /T
```

---

## 📦 Package Management

### Composer

```bash
# Install dependencies
composer install

# Update dependencies
composer update

# Require package
composer require vendor/package

# Remove package
composer remove vendor/package

# Autoload regenerate
composer dump-autoload

# Check outdated packages
composer outdated

# Check security vulnerabilities
composer audit
```

### NPM (Frontend)

```bash
# Install dependencies
npm install

# Run build
npm run build

# Run dev
npm run dev

# Watch files
npm run watch
```

---

## 🏗️ Code Generation

### Make Commands

```bash
# Create Model
php artisan make:model ModelName

# Create Migration
php artisan make:migration migration_name

# Create Controller
php artisan make:controller ControllerName

# Create Service
php artisan make:provider ServiceProvider

# Create Request (Form Validation)
php artisan make:request CreateXxxRequest

# Create middleware
php artisan make:middleware MiddlewareName

# Create Job/Queue
php artisan make:job JobName

# Create Event
php artisan make:event EventName

# Create Listener
php artisan make:listener ListenerName

# Create Seeder
php artisan make:seeder SeederName
```

---

## 📊 Info Commands

### Application Information

```bash
# Show Laravel version
php artisan --version

# Show all commands
php artisan list

# Show command help
php artisan help serve

# Show routes
php artisan route:list

# Show configuration
php artisan config:show

# Show environment info
php artisan about

# Show storage info
php artisan storage:link
```

---

## 🐛 Common Issues & Fixes

### Issue: Port already in use

```powershell
# Find process using port
Get-NetTCPConnection -LocalPort 8001

# Kill process (Windows)
Stop-Process -Name php.exe

# Use different port
php artisan serve --port=8002
```

### Issue: Connection refused

```bash
# Check if server running
curl http://localhost:8001

# Restart server
php artisan serve --port=8001
```

### Issue: Database connection error

```bash
# Check database credentials
php artisan migrate

# Test connection
php artisan tinker
> DB::connection()->getPdo()
```

### Issue: Cache issues

```bash
# Clear cache
php artisan cache:clear

# Regenerate autoload
composer dump-autoload

# Clear all
php artisan cache:clear && php artisan config:cache
```

---

## ⌨️ Keyboard Shortcuts (Laravel Tinker)

```
Ctrl+C     → Exit Tinker
Up/Down    → Command history
Tab        → Auto-complete
Ctrl+D     → Exit
exit       → Exit (also works)
quit       → Quit
help       → Show help
```

---

## 📋 Useful Aliases (PowerShell)

```powershell
# Create aliases in PowerShell profile
$PROFILE

# Add these lines:
Set-Alias -Name artisan -Value "php artisan"
Set-Alias -Name composer -Value "composer.phar"
Set-Alias -Name npm -Value "npm"

# Usage:
artisan serve --port=8001
artisan tinker
composer install
```

---

## 🚀 Production Commands

```bash
# Production build
php artisan config:cache
php artisan route:cache
php artisan view:cache
npm run build

# Optimize for production
php artisan optimize
php artisan migrate --force

# Health check
curl https://yourdomain.com/api/health
```

---

**Semua command penting untuk development E-GovToba Producer-Consumer sudah tercatat!**

Gunakan panduan ini sebagai referensi cepat saat development.
