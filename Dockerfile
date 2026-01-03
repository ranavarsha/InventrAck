FROM php:8.2-apache

# Disable conflicting MPMs
RUN a2dismod mpm_event mpm_worker || true

# Enable prefork (required for PHP)
RUN a2enmod mpm_prefork rewrite

# Copy project files
COPY . /var/www/html/

# Permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Expose port
EXPOSE 80
