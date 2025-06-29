#!/bin/sh
set -e

mkdir -p bootstrap/cache
chmod -R 775 bootstrap/cache

php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
php artisan config:cache

php artisan migrate --force

exec php artisan serve --host=0.0.0.0 --port="${PORT:-8080}"
