FROM php:8.3-apache

# 1. Install sistem dependensi yang dibutuhkan
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    curl \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql mbstring exif pcntl bcmath zip

# 2. Matikan modul MPM event bawaan Apache agar tidak bentrok
RUN a2dismod mpm_event || true
RUN a2enmod mpm_prefork || true

# 3. Aktifkan mod_rewrite Apache untuk routing Laravel
RUN a2enmod rewrite

# 4. Atur Document Root Apache langsung mengarah ke folder public Laravel
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# 5. Copy source code aplikasi ke dalam container
WORKDIR /var/www/html
COPY . /var/www/html

# 6. Install Composer & dependensi Laravel vendor
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --no-interaction --optimize-autoloader --no-dev

# 7. Atur permission folder storage dan cache agar bisa ditulis oleh server
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# 8. Buka port default web apache
EXPOSE 80