FROM php:8.2-apache

# Enable Apache rewrite
RUN a2enmod rewrite

# Remove conflicting MPMs (IMPORTANT FIX)
RUN a2dismod mpm_event mpm_worker && a2enmod mpm_prefork

# Set Apache DocumentRoot
ENV APACHE_DOCUMENT_ROOT=/var/www/html

# Copy project files
COPY . /var/www/html/

# Fix permissions
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80
