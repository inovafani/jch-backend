#!/bin/bash

# Pastikan folder view & cache ada
mkdir -p storage/framework/views
mkdir -p bootstrap/cache

# Set permission
chmod -R 775 storage bootstrap/cache storage/framework/views

# Migrasi database (pakai force biar jalan di production)
php artisan migrate --force

# Jalankan server Laravel
php artisan serve --host=0.0.0.0 --port=${PORT}