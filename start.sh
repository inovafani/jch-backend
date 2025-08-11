#!/bin/bash
rm -f bootstrap/cache/*.php
composer install --no-dev --optimize-autoloader
php artisan config:clear
php artisan route:clear
php artisan view:clear
chmod -R 775 storage bootstrap/cache
php artisan serve --host=0.0.0.0 --port=${PORT}
