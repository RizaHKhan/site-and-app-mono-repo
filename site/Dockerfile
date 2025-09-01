FROM wordpress:latest
# Copy custom WordPress files (if any)
COPY . /var/www/html

RUN chown -R www-data:www-data /var/www/html

HEALTHCHECK --interval=30s --timeout=10s --start-period=30s --retries=3 \
    CMD curl -f http://localhost/wp-login.php || exit 1

EXPOSE 80
