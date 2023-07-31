# Stage 1: Composer Install
FROM composer:2.1 as composer

WORKDIR /app

COPY composer.json composer.json
COPY composer.lock composer.lock

RUN composer install -vvv

# Stage 2: Build the final image
FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    apt-utils \
    libpq-dev \
    libpng-dev \
    libzip-dev \
    zip unzip \
    git && \
    docker-php-ext-install pdo_mysql && \
    docker-php-ext-install bcmath && \
    docker-php-ext-install gd && \
    docker-php-ext-install zip && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

COPY ./_docker/app/php.ini /usr/local/etc/php/conf.d/php.ini

# Copy installed dependencies from the composer stage
COPY --from=composer /app/vendor /var/www/vendor

COPY . /var/www

WORKDIR /var/www

CMD ["php-fpm"]
