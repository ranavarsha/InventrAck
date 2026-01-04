FROM php:8.2-apache

# Enable PHP extensions
RUN docker-php-ext-install mysqli

# Fix MPM conflict
RUN a2dismod mpm_event mpm_worker \
 && a2enmod mpm_prefork

# Copy project files
COPY . /var/www/html/

# Set permissions
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80
