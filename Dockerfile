# Use the official PHP-FPM image as the base
FROM public.ecr.aws/docker/library/php:fpm

# Define a user variable
ARG user=www-data

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    git curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip unzip libzip-dev \
    nginx \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-install \
    pdo_mysql \
    mbstring \
    exif \
    pcntl \
    bcmath \
    gd \
    zip

RUN curl -fsSL https://deb.nodesource.com/setup_lts.x | bash - \
    && apt-get install -y nodejs supervisor lsof \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Install Composer
COPY --from=public.ecr.aws/composer/composer:latest-bin /composer /usr/bin/composer

# Create a system user for running Composer and Artisan commands
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

# Copy Nginx configuration and entrypoint script
COPY nginx.conf /etc/nginx/conf.d/default.conf
RUN rm -f /etc/nginx/sites-enabled/default
COPY supervisord.conf /etc/supervisord.conf

RUN sed -i \
    -e 's|^listen = .*|listen = /var/run/php-fpm.sock|' \
    -e 's|^;listen.owner = .*|listen.owner = www-data|' \
    -e 's|^;listen.group = .*|listen.group = www-data|' \
    -e 's|^;listen.mode = .*|listen.mode = 0660|' \
    /usr/local/etc/php-fpm.d/www.conf \
    && sed -i 's|^listen = .*|listen = /var/run/php-fpm.sock|' /usr/local/etc/php-fpm.d/zz-docker.conf \
    && grep 'listen' /usr/local/etc/php-fpm.d/*.conf

# Set the working directory
WORKDIR /app

COPY composer.json composer.lock package.json package-lock.json ./

COPY . .

# Give permission to the www-data user
RUN chown -R $user:$user /app \
    && mkdir -p /var/www/.npm \
    && chown -R $user:$user /var/www/.npm

RUN composer install --no-progress --no-interaction --prefer-dist --optimize-autoloader --no-dev \
    && npm ci --no-audit --no-fund --unsafe-perm \
    && npm run build

EXPOSE 80

COPY entrypoint.sh /usr/local/bin/entrypoint.sh

ENTRYPOINT ["entrypoint.sh"]
