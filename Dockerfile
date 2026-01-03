FROM php:8.2-apache

# Disable other MPMs and enable prefork (PHP needs this)
RUN a2dismod mpm_event mpm_worker
RUN a2enmod mpm_prefork rewrite

# Copy project files
COPY . /var/www/html/

# Fix permissions
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80
