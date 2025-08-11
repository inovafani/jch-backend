#!/bin/bash
php artisan migrate --force
chmod -R 775 storage bootstrap/cache
php artisan serve --host=0.0.0.0 --port=${PORT}
