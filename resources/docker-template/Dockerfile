ARG PHP_VER

FROM php:8.2-fpm-alpine

RUN apk update
RUN apk add --no-cache build-base
RUN apk add --no-cache autoconf
RUN apk add --no-cache automake




# mcrypt
RUN apk add --no-cache libmcrypt-dev
RUN pecl install mcrypt
RUN docker-php-ext-enable mcrypt



# bcmath
RUN docker-php-ext-install bcmath
RUN docker-php-ext-enable bcmath

