# su dung hinh anh co so
FROM php:8.2.9-fpm
# Thiet lap thu muc lam viec
WORKDIR /var/www
# Cai dat moi truong 
RUN apt-get update && apt-get install -y \
    build-essential \
    locales \
    libpng-dev \
    libzip-dev \
    zip \
    vim \
    git \
    curl \
    unzip 
# Ho tro ket noi php voi mysql
RUN docker-php-ext-install pdo pdo_mysql 
RUN docker-php-ext-enable pdo_mysql
# mysqli mbstring zip exif pcntl
# Cai dat trinh soan thao 
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
# Tao nguoi dung moi 
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www \
    && chown -R www:www /var/www
 # Thay doi nguoi dung
USER www
