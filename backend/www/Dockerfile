FROM php:8.3-fpm

RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Установка Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY . .

# Установка зависимостей
RUN composer install

# Установка прав на storage и bootstrap/cache
RUN chown -R www-data:www-data /var/www/storage
RUN chown -R www-data:www-data /var/www/bootstrap/cache

# Копирование примера .env и генерация ключа приложения
RUN cp .env.example .env
RUN php artisan key:generate

# Открываем порт для приложения
EXPOSE 8000

# Запускаем Laravel-сервер
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]