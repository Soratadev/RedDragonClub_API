# Usar la imagen oficial de PHP con Apache
FROM php:8.2-apache

# Instalar extensiones necesarias
ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/
RUN apt-get update && apt-get install -y \
    unzip \
    zip \
    git \
    curl \
    gnupg \
    && chmod +x /usr/local/bin/install-php-extensions && \
    install-php-extensions \
        apcu \
        bcmath \
        pdo \
        pdo_pgsql \
        gd \
        intl \
        gmp \
        opcache \
        pcntl \
        soap \
        xsl \
        sockets \
        uuid \
        zip \
        xdebug \

# Instalar Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Instalar PostgreSQL
RUN apt-get update && apt-get install -y \
    libpq-dev \
    postgresql-client \
    && docker-php-ext-install pgsql

RUN curl -sS https://get.symfony.com/cli/installer | bash

# Habilitar mod_rewrite para Symfony
RUN a2enmod rewrite

# Fijar permisos de Symfony
RUN mkdir -p var/cache var/logs && \
    chmod -R 777 var/cache var/logs

# Establecer el directorio de trabajo
WORKDIR /var/www/html

# Exponer el puerto 80
EXPOSE 80
