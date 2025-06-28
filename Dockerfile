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

RUN mkdir -p /app/storage/framework/{views,cache,sessions,testing} /app/storage/logs /app/bootstrap/cache
RUN chmod -R 775 /app/storage /app/bootstrap/cache
RUN mkdir -p /app/resources/views /app/storage/framework/views && chmod -R 775 /app/resources/views /app/storage/framework/views

# Supervisor config for running both php-fpm and nginx
COPY --chown=root:root supervisord.conf /etc/supervisor/conf.d/supervisord.conf

EXPOSE 8080

CMD php artisan config:clear && \
    php artisan cache:clear && \
    php artisan route:clear && \
    php artisan view:clear && \
    php artisan config:cache && \
    php artisan migrate --force && \
    supervisord -c /etc/supervisor/conf.d/supervisord.conf
