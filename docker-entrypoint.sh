#!/bin/sh
set -e

# Tunggu DB siap
wait-for-it db:3306 --timeout=60 --strict --

# Persiapkan direktori cache
mkdir -p bootstrap/cache
chmod -R 775 bootstrap/cache

# Clear + cache config
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
php artisan config:cache

# Jalankan migrasi
php artisan migrate --force

# Jalankan server Laravel
exec php artisan serve --host=0.0.0.0 --port="${PORT:-8080}"
