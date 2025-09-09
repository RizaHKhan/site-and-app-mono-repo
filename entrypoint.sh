#!/bin/sh

# Run database migrations
php artisan migrate --force

# Cache configuration
php artisan config:cache

# Cache routes
php artisan route:cache

# Cache views
php artisan view:cache

# Start supervisord
exec supervisord -c /etc/supervisord.conf
