#!/bin/sh
set -e

echo "Menunggu database siap..."
until mysql -h "$DB_HOST" -P "$DB_PORT" -u "$DB_USERNAME" -p"$DB_PASSWORD" -e "SELECT 1" > /dev/null 2>&1; do
  echo "Waiting for DB..."
  sleep 1
done

mkdir -p bootstrap/cache && chmod -R 775 bootstrap/cache

php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
php artisan config:cache

php artisan migrate --force

exec php artisan serve --host=0.0.0.0 --port=${PORT:-8080}
