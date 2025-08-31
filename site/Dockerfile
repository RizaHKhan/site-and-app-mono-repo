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
COPY ./default.conf /etc/nginx/conf.d/default.conf

# Copy supervisor config
COPY ./supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Set permissions
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80

CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]

