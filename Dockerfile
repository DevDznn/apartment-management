# -------------------------
# 1. Base image
# -------------------------
FROM php:8.2-cli

# -------------------------
# 2. Install system dependencies
# -------------------------
RUN apt-get update && apt-get install -y \
    git unzip curl libzip-dev nodejs npm \
    && docker-php-ext-install pdo_mysql zip

# -------------------------
# 3. Set working directory
# -------------------------
WORKDIR /app

# -------------------------
# 4. Copy project files
# -------------------------
COPY . .

# -------------------------
# 5. Install PHP dependencies
# -------------------------
RUN composer install --no-dev --optimize-autoloader

# -------------------------
# 6. Handle .env and key generation
# -------------------------
RUN if [ ! -f .env ]; then cp .env.example .env; fi
RUN php artisan key:generate --force || echo "APP_KEY already set, skipping."

# -------------------------
# 7. Install Node dependencies & build assets
# -------------------------
RUN npm install
RUN npm run build

# -------------------------
# 8. Cache config & routes
# -------------------------
RUN php artisan config:cache
RUN php artisan route:cache

# -------------------------
# 9. Set permissions (storage & cache)
# -------------------------
RUN chown -R www-data:www-data /app && chmod -R 775 /app/storage /app/bootstrap/cache

# -------------------------
# 10. Optional: disable DB errors if DB is missing (UI-only friendly)
# -------------------------
RUN touch /app/database/database.sqlite || echo "SQLite not needed now."

# -------------------------
# 11. Expose dynamic port
# -------------------------
EXPOSE $PORT

# -------------------------
# 12. Start Laravel using Render's port
# -------------------------
CMD php artisan serve --host=0.0.0.0 --port=$PORT
