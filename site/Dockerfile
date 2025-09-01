FROM wordpress:latest
# Copy custom WordPress files (if any)
COPY . /var/www/html

RUN chown -R www-data:www-data /var/www/html

EXPOSE 80
