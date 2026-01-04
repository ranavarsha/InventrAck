FROM php:8.2-apache

# Install mysqli only
RUN docker-php-ext-install mysqli

# Copy project
COPY . /var/www/html/

# Permissions
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80
