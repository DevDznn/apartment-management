#!/bin/sh
# Replace ${PORT} in nginx config with actual value from Railway
envsubst '${PORT}' < /etc/nginx/conf.d/default.conf.template > /etc/nginx/conf.d/default.conf

# Start supervisor (runs nginx + php-fpm)
exec /usr/bin/supervisord -c /etc/supervisord.conf
