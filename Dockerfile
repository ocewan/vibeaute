# Récupérer l'image php-fpm
FROM php:8.2-fpm as php-fpm

# Installer les dépendances nécessaires
RUN docker-php-ext-install mysqli pdo pdo_mysql \
    && pecl install mongodb \
    && docker-php-ext-enable mongodb

# Définir le répertoire de travail
# mkdir -p /var/www/html && cd
WORKDIR /var/www/html

# Copier le code source dans le conteneur
COPY ./src /var/www/html