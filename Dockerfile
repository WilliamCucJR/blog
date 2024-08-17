FROM php:8.1-apache

RUN docker-php-ext-install mysqli

COPY src/ /var/www/html/

COPY .env /var/www/html/

WORKDIR /var/www/html