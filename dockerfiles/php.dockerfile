FROM php:8.0-fpm-buster


WORKDIR /var/www/html/  

RUN pecl install xdebug && docker-php-ext-enable xdebug




