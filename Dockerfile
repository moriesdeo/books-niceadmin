# ---------- Build stage ----------
FROM php:8.2-fpm as build

# Install system dependencies
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
    && rm -rf /var/lib/apt/lists/*

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /app

# Copy composer files & install dependencies
COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader --no-scripts --verbose

# Copy app source
COPY . .

# Set proper permissions
RUN mkdir -p /app/storage/framework/{views,cache,sessions,testing} /app/storage/logs /app/bootstrap/cache \
    && chmod -R 775 /app/storage /app/bootstrap/cache

# ---------- Final stage ----------
FROM nginx:alpine as runtime

# Copy Nginx config
COPY nginx.conf /etc/nginx/conf.d/default.conf

# Copy built app + PHP
COPY --from=build /app /app
COPY --from=build /usr/local/etc/php /usr/local/etc/php
COPY --from=build /usr/local/bin/php /usr/local/bin/php
COPY --from=build /usr/local/bin/composer /usr/local/bin/composer
COPY --from=build /usr/local/lib/php /usr/local/lib/php

# Install PHP-FPM
RUN apk add --no-cache php8 php8-fpm php8-opcache php8-pdo php8-pdo_mysql php8-mbstring php8-bcmath php8-gd php8-zip php8-exif php8-pcntl

WORKDIR /app

EXPOSE 8080

CMD php artisan migrate --force && php artisan config:cache && \
    php-fpm8 --nodaemonize & nginx -g "daemon off;"
