#!/bin/bash
set -e

# Jalankan migrasi
php artisan migrate --force

# Pastikan permission & folder Laravel yang dibutuhkan
mkdir -p storage/framework/views
mkdir -p storage/framework/cache
mkdir -p storage/framework/sessions
chmod -R 775 storage bootstrap/cache

# Bersihkan cache Laravel
php artisan config:clear
php artisan cache:clear
php artisan route:clear

# Bersihkan compiled views (sekarang foldernya sudah dijamin ada)
php artisan view:clear

# Jalankan Laravel
php artisan serve --host=0.0.0.0 --port=${PORT}