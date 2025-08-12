#!/bin/bash
set -e

# Jalankan migrasi database
php artisan migrate --force

# Atur permission folder yang dibutuhkan Laravel
chmod -R 775 storage bootstrap/cache

# Bersihkan cache Laravel untuk mencegah config lama nyangkut
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear

# Jalankan Laravel di port Railway
php artisan serve --host=0.0.0.0 --port=${PORT}