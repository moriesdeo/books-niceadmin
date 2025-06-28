FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    nginx \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    zip \
    unzip \
    supervisor \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

WORKDIR /app

COPY . .
COPY nginx.conf /etc/nginx/sites-available/default

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install --no-dev --optimize-autoloader --no-scripts --verbose

# Ensure storage, cache, and view folders exist
RUN mkdir -p /app/storage /app/bootstrap/cache /app/resources/views /app/storage/framework/views

# Supervisor config for running both php-fpm and nginx
COPY --chown=root:root supervisord.conf /etc/supervisor/conf.d/supervisord.conf

EXPOSE 9000

CMD mkdir -p /app/storage /app/bootstrap/cache /app/storage/framework/views && \
    chmod -R 775 /app/storage /app/bootstrap/cache && \
    php artisan migrate --force && \
    php-fpm -F
