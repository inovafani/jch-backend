#!/bin/bash

# Jalankan migrate
php artisan migrate --force

# Set permission storage dan cache
chmod -R 775 storage bootstrap/cache

# Clear dan cache ulang config, route, view
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Jalankan Laravel di host dan port Railway
php artisan serve --host=0.0.0.0 --port=${PORT}
