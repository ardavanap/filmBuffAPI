FROM php:8.4-fpm

#   System dependencies

RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    && apt-get clean && rm -rf /var/lib/apt/lists/*


#   PHP extensions

RUN docker-php-ext-install \
    pdo_mysql \
    mbstring \
    exif \
    pcntl \
    bcmath \
    gd


#   Install Composer

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer


#   Create non-root user

ARG uid=1000
ARG user=www

RUN groupadd -g $uid $user && \
    useradd -u $uid -g $user -m -s /bin/bash $user


#   Copy project with correct permissions

WORKDIR /var/www
COPY --chown=$user:$user . /var/www


#   Switch to non-root user

USER $user


#   Expose PHP-FPM port

EXPOSE 9000

CMD ["php-fpm"]