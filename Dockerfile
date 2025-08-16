# Use PHP CLI with necessary extensions
FROM php:8.2-cli

# Install system dependencies for Laravel + Node
RUN apt-get update && apt-get install -y \
    git unzip curl libzip-dev nodejs npm && docker-php-ext-install pdo_mysql zip

# Set working directory
WORKDIR /app

# Copy all project files
COPY . .

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Clear config cache
RUN php artisan config:clear

# Install Node dependencies and build assets
RUN npm install
RUN npm run build

# Set folder permissions
RUN chown -R www-data:www-data /app && chmod -R 775 /app/storage /app/bootstrap/cache

# Expose port for Render
EXPOSE 10000

# Start Laravel
CMD php artisan serve --host=0.0.0.0 --port=10000
