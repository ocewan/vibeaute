# Récupérer l'image php-fpm
FROM php:8.2-fpm as php-fpm

# Installer les dépendances nécessaires
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libssl-dev \
    libcurl4-openssl-dev \
    pkg-config \
    libssl-dev \
    libgssapi-krb5-2 \
    libkrb5-dev \
    libicu-dev \
    libzip-dev \
    g++ \
    && docker-php-ext-install intl zip pdo pdo_mysql mysqli

# Cloner et compiler le driver MongoDB PHP avec SSL supporté
RUN git clone https://github.com/mongodb/mongo-php-driver.git /usr/src/mongo-php-driver \
    && cd /usr/src/mongo-php-driver \
    && git submodule update --init \
    && phpize \
    && ./configure --with-mongodb-ssl=openssl \
    && make -j$(nproc) \
    && make install \
    && echo "extension=mongodb.so" > /usr/local/etc/php/conf.d/mongodb.ini

# Définir le répertoire de travail
# mkdir -p /var/www/html && cd
WORKDIR /var/www/html

# Copier le code source dans le conteneur
COPY ./src /var/www/html