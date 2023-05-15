FROM php:8.1.11-fpm

# Composerをインストールする
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# 必要なパッケージをインストールする
RUN apt-get update
RUN apt-get install -y \
    git \
    zip \
    unzip \
    vim \
    gnupg \
    procps \
    libpq-dev \
    zlib1g-dev \
    libpng-dev \
    libzip-dev

# PHP拡張をインストールする
RUN docker-php-ext-install pdo_mysql pdo_pgsql gd zip pcntl
