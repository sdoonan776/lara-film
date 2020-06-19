FROM php:7.3-fpm

RUN apt-get update && apt-get install -y libmcrypt-dev default-mysql-client libpng-dev libjpeg-dev libfreetype6-dev \
    && pecl install mcrypt-1.0.2 \
    && docker-php-ext-enable mcrypt \
    && docker-php-ext-install pdo_mysql bcmath \
    && docker-php-ext-install gd

WORKDIR /var/www

