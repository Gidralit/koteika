# Используем PHP 8.3 с FPM
FROM php:8.3-fpm

# Установка необходимых пакетов и расширений
RUN apt-get update && apt-get install -y \
    libcurl4-openssl-dev \
    libpq-dev \
    libzip-dev \
    unzip \
    git \
    && docker-php-ext-install pdo pdo_pgsql zip \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Установка Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Установка рабочей директории
WORKDIR /var/www

COPY . .

# Установка прав на папки
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

RUN composer require laravel/sanctum

# Открываем порт 8000
EXPOSE 8000

CMD [ "php artisan key:generate" ]