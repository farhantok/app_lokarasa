#!/bin/bash
set -e

# Pastikan tidak ada duplikasi MPM yang aktif
# Kita matikan semua MPM, lalu nyalakan mpm_prefork (dibutuhkan oleh mod_php)
a2dismod -f mpm_event mpm_worker mpm_prefork > /dev/null 2>&1 || true
a2enmod mpm_prefork

# Konfigurasi Port Railway secara dinamis
# Jika PORT dari Railway ada, gunakan itu, jika tidak gunakan 80
PORT="${PORT:-80}"
sed -i "s/Listen 80/Listen ${PORT}/g" /etc/apache2/ports.conf
sed -i "s/<VirtualHost \*:80>/<VirtualHost \*:${PORT}>/g" /etc/apache2/sites-available/000-default.conf

# Jalankan migrasi database dan bersihkan cache Laravel
echo "Menjalankan migrasi database..."
php artisan migrate --force

echo "Membersihkan cache Laravel..."
php artisan config:clear
php artisan cache:clear

# Eksekusi perintah utama apache
exec docker-php-entrypoint apache2-foreground
