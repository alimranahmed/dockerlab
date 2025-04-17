FROM php:8.4-fpm-alpine

# Install system dependencies and PHP extensions
RUN apk add --no-cache \
    git curl unzip zip libzip-dev \
    && docker-php-ext-install pdo pdo_mysql zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

COPY composer.json /app

RUN composer install --no-interaction --prefer-dist --optimize-autoloader

COPY . /app

EXPOSE 3000

CMD ["php", "start"]