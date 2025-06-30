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
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

WORKDIR /app

COPY . .

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN php -v && php -m && composer diagnose

RUN composer install --no-dev --optimize-autoloader --no-scripts --verbose

RUN mkdir -p /app/storage/framework/{views,cache,sessions,testing} /app/storage/logs /app/bootstrap/cache
RUN chmod -R 775 /app/storage /app/bootstrap/cache
RUN mkdir -p /app/resources/views /app/storage/framework/views && chmod -R 775 /app/resources/views /app/storage/framework/views

EXPOSE 8080

# --- RAILWAY DEPLOYMENT NOTE ---
# Railway will set the PORT environment variable automatically.
# Make sure your Laravel app uses env('PORT', 8080) for the serve command.
# Ensure .env and all required environment variables are set in Railway dashboard.
# --------------------------------

CMD set -e && \
    mkdir -p bootstrap/cache && chmod -R 775 bootstrap/cache && \
    php artisan config:clear && \
    php artisan cache:clear && \
    php artisan route:clear && \
    php artisan view:clear && \
    php artisan config:cache && \
    php artisan migrate --force && \
    php artisan serve --host=0.0.0.0 --port=${PORT:-8080}

