# Используем PHP 8.3 с FPM
FROM php:8.3-fpm

# Установка необходимых пакетов и расширений
RUN apt-get update && apt-get install -y \
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

# Установка зависимостей с помощью Composer
RUN composer install --prefer-dist --no-progress --no-suggest --optimize-autoloader

# Установка прав на папки
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Открываем порт 8000
EXPOSE 8000

# Запускаем Laravel-сервер
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
