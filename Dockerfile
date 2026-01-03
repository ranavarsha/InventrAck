FROM php:8.2-apache

WORKDIR /var/www/html

COPY . .

RUN docker-php-ext-install mysqli

RUN chown -R www-data:www-data /var/www/html

EXPOSE 80
