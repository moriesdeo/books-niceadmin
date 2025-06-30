# === STAGE 1: BUILD ASSET ===
FROM node:20 AS node-build

WORKDIR /app

# Copy package files dan install dep
COPY package*.json ./
RUN npm ci

# Copy source code
COPY . .

# Build asset production
RUN npm run prod

# === STAGE 2: BUILD PHP + COPY BUILT ASSET ===
FROM php:8.2-fpm

# Install PHP extension
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

# Copy app code + hasil build asset
COPY --from=node-build /app /app

# Install composer prod dependencies
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install --no-dev --optimize-autoloader --prefer-dist --no-scripts --verbose

# Cache config, route, view
RUN php artisan config:cache && php artisan route:cache && php artisan view:cache

# Set permission storage & cache
RUN mkdir -p /app/storage/framework/{views,cache,sessions,testing} /app/storage/logs /app/bootstrap/cache \
    && chmod -R 775 /app/storage /app/bootstrap/cache

EXPOSE 8080

CMD set -e && \
    php artisan migrate --force && \
    php artisan serve --host=0.0.0.0 --port=${PORT:-8080}
