# -------------------------
# 1. Base PHP image (builder)
# -------------------------
FROM php:8.2-fpm AS php-builder

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

# -------------------------
# 2. Nginx + PHP-FPM production image
# -------------------------
FROM nginx:alpine

# Install PHP-FPM
RUN apk add --no-cache php8 php8-fpm php8-opcache php8-pdo_mysql php8-bcmath php8-gd php8-xml php8-mbstring php8-tokenizer

# Set working directory
WORKDIR /var/www/html

# Copy built Laravel app from builder
COPY --from=php-builder /var/www/html /var/www/html

# Copy Nginx config
COPY ./nginx.conf /etc/nginx/conf.d/default.conf

# Set permissions
RUN chown -R nginx:nginx /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 80

# Start both PHP-FPM and Nginx
CMD php-fpm8 -D && nginx -g "daemon off;"
