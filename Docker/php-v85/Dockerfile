FROM php:8.5-fpm
# I might use a database at some point, so I've included dependencies 
# that I may need in the future. Since this is a study environment, 
# I prefer to have them ready rather than keeping it minimal.
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libpq-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    curl

RUN apt-get clean && rm -rf /var/lib/apt/lists/*
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install \
    pdo_mysql \
    pdo_pgsql \
    pgsql \
    bcmath \
    gd \
    zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

EXPOSE 9000