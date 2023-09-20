FROM php:8.2.9-fpm

WORKDIR /var/www

RUN apt-get update && apt-get install - y \
    zip \ 
    vim \
    git \
    curl \
    unzip

COPY . /app/
