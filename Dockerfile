# -------------------------
# 1. Base PHP image (build & runtime)
# -------------------------
FROM php:8.2-fpm

# Set working directory
WORKDIR /var/www/html

# System dependencies
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    curl \
    zip \
    npm \
    nodejs \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    nginx \
    supervisor \
    && docker-php-ext-install pdo pdo_mysql zip bcmath gd

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy project files
COPY . .

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader \
    && php artisan config:cache \
    && php artisan route:cache \
    && php artisan view:cache

# Install Node dependencies & build assets
RUN npm install && npm run build

# Copy Nginx config
COPY ./nginx.conf /etc/nginx/conf.d/default.conf

# Supervisor config (to run php-fpm + nginx together)
COPY ./supervisord.conf /etc/supervisord.conf

# Set permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 80

# Run both php-fpm and nginx via supervisor
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisord.conf"]
