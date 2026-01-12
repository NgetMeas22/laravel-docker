FROM php:8.4-apache

#install system dependencies
RUN apt-get update && apt-get install -y \
    zip unzip git \
    && docker-php-ext-install pdo pdo_mysql

#install composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

#set working directory
WORKDIR /var/www/html

#start laravel
CMD cd laravel && php artisan serve --host=0.0.0.0
