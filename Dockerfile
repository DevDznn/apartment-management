# -------------------------
# 1. Base PHP image
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
    gettext \
    && docker-php-ext-install pdo pdo_mysql zip bcmath gd

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy project files
COPY . .

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Install Node dependencies & build assets
RUN npm install && npm run build

# Copy Nginx config template (with $PORT variable)
COPY ./nginx.conf /etc/nginx/conf.d/default.conf.template

# Supervisor config
COPY ./supervisord.conf /etc/supervisord.conf

# Entrypoint script (to inject $PORT and run artisan cache)
COPY ./start.sh /start.sh
RUN chmod +x /start.sh

# Set permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Expose port (Railway maps $PORT to this)
EXPOSE 8080

# Run start script
CMD ["/start.sh"]
