FROM php:8-fpm

COPY /docker/php/php.ini /usr/local/etc/php/php.ini

RUN apt-get update \
    && apt-get install -y git acl openssl openssh-client wget zip vim librabbitmq-dev libssh-dev \
    && apt-get install -y libpng-dev zlib1g-dev libzip-dev libxml2-dev libicu-dev \
    && docker-php-ext-install intl pdo pdo_mysql zip gd soap sockets bcmath \
    && pecl install amqp \
    && docker-php-ext-enable --ini-name 05-opcache.ini opcache amqp

RUN pecl install -o -f redis \
    && rm -rf /tmp/pear \
    && docker-php-ext-enable redis \
    && apt -y install curl git unzip

RUN curl --insecure https://getcomposer.org/composer.phar -o /usr/bin/composer && chmod +x /usr/bin/composer
RUN composer self-update

WORKDIR /appdata/www

ENV APP_ENV prod
COPY /composer.* ./
RUN composer install --no-dev
COPY / ./
RUN bin/console assets:install

RUN bin/console cache:clear