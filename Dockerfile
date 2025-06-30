FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    zip \
    unzip \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

WORKDIR /app

COPY . .

RUN chmod -R 775 /app/resources/views /app/storage /app/bootstrap/cache || true

EXPOSE 8080

CMD set -e && \
    php artisan config:clear && php artisan route:clear && php artisan view:clear && \
    php artisan config:cache && php artisan route:cache && php artisan view:cache && \
    php artisan migrate --force && \
    php artisan serve --host=0.0.0.0 --port=${PORT:-8080}
