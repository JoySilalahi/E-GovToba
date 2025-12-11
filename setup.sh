#!/bin/bash

# Script untuk menjalankan Producer-Consumer Architecture

echo "=================================="
echo "E-GovToba Producer-Consumer Setup"
echo "=================================="

# Check if composer dependencies installed
if [ ! -d "vendor" ]; then
    echo "Installing composer dependencies..."
    composer install
fi

# Create or copy .env if not exists
if [ ! -f ".env" ]; then
    echo "Creating .env from .env.example..."
    cp .env.example .env
    php artisan key:generate
fi

# Run migrations
echo "Running migrations..."
php artisan migrate --force

# Clear cache
echo "Clearing cache..."
php artisan cache:clear
php artisan config:cache

echo ""
echo "✅ Setup selesai!"
echo ""
echo "📋 Langkah Selanjutnya:"
echo "1. Buka terminal baru untuk Producer API:"
echo "   php artisan serve --port=8001"
echo ""
echo "2. Buka terminal lain untuk Consumer App:"
echo "   php artisan serve --port=8000"
echo ""
echo "3. Test API:"
echo "   curl http://localhost:8001/api/v1/districts"
echo ""
echo "4. Buka di browser:"
echo "   http://localhost:8000"
echo ""
