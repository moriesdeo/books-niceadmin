FROM php:8.1-fpm

RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

WORKDIR /app

COPY . /app

RUN mkdir -p /app/storage /app/bootstrap/cache \
    && chmod -R ug+rwx /app/storage /app/bootstrap/cache

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN composer install --no-dev --optimize-autoloader --no-scripts

RUN chown -R www-data:www-data /app

EXPOSE 8000

CMD su www-data -s /bin/sh -c "php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=8000"
