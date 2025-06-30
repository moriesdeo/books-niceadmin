FROM php:8.2-fpm

# Install PHP extensions
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

# Copy semua file, termasuk resources/views + public/assets/forms
COPY . .

# Install composer dependencies (production)
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install --no-dev --optimize-autoloader --prefer-dist --no-scripts --verbose

# Set permission supaya view + storage aman
RUN chmod -R 775 /app/resources/views /app/storage /app/bootstrap/cache

EXPOSE 8080

# Build cache saat runtime (env sudah ada)
CMD set -e && \
    php artisan config:clear && php artisan route:clear && php artisan view:clear && \
    php artisan config:cache && php artisan route:cache && php artisan view:cache && \
    php artisan migrate --force && \
    php artisan serve --host=0.0.0.0 --port=${PORT:-8080}
