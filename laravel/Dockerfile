FROM php:8.4-apache

RUN apt-get update && apt-get install -y \
    zip unzip git \
    && docker-php-ext-install pdo pdo_mysql

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

CMD php artisan serve --host=0.0.0.0 --port=8000
