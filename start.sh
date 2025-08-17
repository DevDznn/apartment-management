#!/bin/sh
# Replace ${PORT} in nginx config with actual Railway PORT
envsubst '${PORT}' < /etc/nginx/conf.d/default.conf.template > /etc/nginx/conf.d/default.conf

# Run Laravel optimizations at runtime (not build)
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Start supervisor (runs nginx + php-fpm)
exec /usr/bin/supervisord -c /etc/supervisord.conf
