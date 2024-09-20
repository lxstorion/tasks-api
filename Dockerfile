FROM php:8.3

RUN apt-get update && apt-get upgrade -y \
    && apt-get install git -y \
    && apt-get install libzip-dev -y
RUN docker-php-ext-install mysqli \
    && docker-php-ext-install zip \
    && docker-php-ext-install pdo pdo_mysql
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN git clone -b Dev https://github.com/lxstorion/tasks-api.git /app

WORKDIR /app
RUN chmod +x configure.sh \
    && chmod +x boot.sh \
    && ./configure.sh
