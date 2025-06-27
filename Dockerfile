FROM php:8.1-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Set working directory
WORKDIR /app

# Copy project files
COPY . /app

# Ensure storage and bootstrap/cache have correct permissions
RUN mkdir -p /app/storage /app/bootstrap/cache \
    && chmod -R 775 /app/storage /app/bootstrap/cache

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install composer dependencies (production only)
RUN composer install --no-dev --optimize-autoloader --no-scripts

# Expose port
EXPOSE 8000

# Start command: run migrations and serve
CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=8000
