FROM php:8.3-fpm

RUN apt-get update && apt-get install -y \
      zlib1g-dev \
      g++ git libicu-dev zip \
      libzip-dev \
      zip \
      libssh-dev \
      postgresql-client \
      libpq-dev

RUN apt-get install -y  \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo pdo_pgsql pgsql

RUN docker-php-ext-configure zip \
    && docker-php-ext-install zip

WORKDIR /app

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
