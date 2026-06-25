FROM php:8.3-fpm

# 1. Install system dependencies yang dibutuhkan Laravel
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libzip-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# 2. Ambil Composer versi terbaru
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 3. Set working directory ke standar Railway
WORKDIR /var/www/html

# 4. Copy seluruh source code project
COPY . .

# 5. Jalankan install vendor via composer
RUN composer install --no-interaction --optimize-autoloader --no-dev

# 6. Atur hak akses permission folder storage & cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# 7. Jalankan server PHP terisolasi (Port dinamis akan diatur otomatis oleh Railway)
EXPOSE 80
# (Kode-kode bagian atas dari nomor 1 sampai 7 biarkan tetap sama)
CMD php artisan config:clear && php artisan cache:clear && php artisan view:clear && php -S 0.0.0.0:80 -t public
# Jalankan pembersihan cache konfigurasi secara paksa sebelum server dinyalakan
