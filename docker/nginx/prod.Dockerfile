FROM php:8-fpm AS assets

RUN apt-get update \
  && apt-get install -y git zip zlib1g-dev libzip-dev \
  && docker-php-ext-install zip

RUN curl --insecure https://getcomposer.org/composer.phar -o /usr/bin/composer && chmod +x /usr/bin/composer
RUN composer self-update

WORKDIR /app

ENV APP_ENV prod
COPY /composer.* ./
RUN composer update
RUN composer install --no-dev
COPY / ./
RUN bin/console assets:install

FROM nginx:1.21

RUN adduser --disabled-password --gecos "" appuser
COPY /docker/nginx/default.prod.conf /etc/nginx/conf.d/default.conf
COPY --from=assets /app/public/ /appdata/www/public/