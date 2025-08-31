FROM public.ecr.aws/docker/library/php:fpm

RUN apt-get update && \
    apt-get install -y \
    nginx supervisor \
    libpng-dev libjpeg-dev libfreetype6-dev libzip-dev zip unzip \
    libonig-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd mysqli mbstring zip \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Copy WordPress files
COPY . /var/www/html

RUN rm -f /var/www/html/index.nginx-debian.html
# Copy nginx config
COPY nginx.conf /etc/nginx/conf.d/default.conf
RUN rm -f /etc/nginx/sites-enabled/default

# Copy supervisor config
COPY ./supervisord.conf /etc/supervisor/conf.d/supervisord.conf

RUN sed -i \
    -e 's|^listen = .*|listen = /var/run/php-fpm.sock|' \
    -e 's|^;listen.owner = .*|listen.owner = www-data|' \
    -e 's|^;listen.group = .*|listen.group = www-data|' \
    -e 's|^;listen.mode = .*|listen.mode = 0660|' \
    /usr/local/etc/php-fpm.d/www.conf \
    && if [ -f /usr/local/etc/php-fpm.d/zz-docker.conf ]; then \
    sed -i 's|^listen = .*|listen = /var/run/php-fpm.sock|' /usr/local/etc/php-fpm.d/zz-docker.conf; \
    fi \
    && grep 'listen' /usr/local/etc/php-fpm.d/*.conf

# Set permissions
RUN chown -R www-data:www-data /var/www/html && \
    chmod -R 755 /var/www/html

EXPOSE 80

CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]

