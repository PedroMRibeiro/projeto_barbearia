# Use the official PHP image with Apache
FROM php:8.2-apache

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    cron \
    vim \
    git \
    curl \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    ca-certificates \
    tzdata \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo_mysql



# Set the timezone to Europe/Lisbon
RUN ln -sf /usr/share/zoneinfo/Europe/Lisbon /etc/localtime && dpkg-reconfigure -f noninteractive tzdata

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Update CA certificates
RUN update-ca-certificates

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Set the document root to Laravel's 'public' directory
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# Set working directory
WORKDIR /var/www/html

# Set up permissions
RUN chown -R www-data:www-data /var/www/html && chmod -R 755 /var/www/html

# Copiar os arquivos de configuração do cron
COPY cronjobs/laravel-cron /etc/cron.d/laravel-cron

# Configurar permissões do cronjob
RUN chmod 7777 /etc/cron.d/laravel-cron

# Aplicar o cronjob
RUN crontab /etc/cron.d/laravel-cron

# Inicia o serviço cron dentro do container
RUN service cron start

# Expose port 80
EXPOSE 80

# Start Apache
CMD cron && apache2-foreground
