# -------------------------
# 1. Base Image
# -------------------------
FROM php:8.2-fpm

# Set working directory
WORKDIR /var/www/html

# -------------------------
# 2. System dependencies
# -------------------------
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
    && docker-php-ext-install pdo pdo_mysql zip bcmath gd

# -------------------------
# 3. Install Composer
# -------------------------
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# -------------------------
# 4. Copy project files
# -------------------------
COPY . .

# -------------------------
# 5. Install PHP dependencies
# -------------------------
RUN composer install --no-dev --optimize-autoloader

# -------------------------
# 6. Install Node dependencies & build assets
# -------------------------
RUN npm install
RUN npm run build

# -------------------------
# 7. Set permissions
# -------------------------
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# -------------------------
# 8. Expose port
# -------------------------
EXPOSE 8000

# -------------------------
# 9. Start Laravel
# -------------------------
CMD php artisan serve --host=0.0.0.0 --port=$PORT
