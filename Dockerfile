# Base image with PHP CLI
FROM php:8.2-cli

# Install system dependencies, Composer, Node.js & npm
RUN apt-get update && apt-get install -y \
    git unzip curl libzip-dev nodejs npm && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer && \
    docker-php-ext-install pdo_mysql zip

# Set working directory
WORKDIR /app

# Copy all project files
COPY . .

# Set proper permissions for Laravel
RUN chown -R www-data:www-data /app && chmod -R 775 /app/storage /app/bootstrap/cache

# Copy .env.example to .env if not exists
RUN cp .env.example .env

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Generate Laravel key (optional; can override in Render envVars)
RUN php artisan key:generate

# Install Node dependencies & build assets
RUN npm install
RUN npm run build

# Cache config and routes
RUN php artisan config:cache
RUN php artisan route:cache

# Expose port for Render
EXPOSE 10000

# Start Laravel
CMD php artisan serve --host=0.0.0.0 --port=10000
