FROM php:7.4-fpm

WORKDIR /app

RUN apt-get update

RUN apt-get -y install git zip libpq-dev libpng-dev

RUN docker-php-ext-install pdo pdo_pgsql pgsql

RUN curl -sL https://getcomposer.org/installer | php -- --install-dir /usr/bin --filename composer

RUN pecl install xdebug-2.9.0

RUN docker-php-ext-install gd



CMD ["php-fpm"]