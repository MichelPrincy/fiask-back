# Utiliser l'image officielle PHP
FROM php:8.2-apache

# Installer extensions nécessaires
RUN docker-php-ext-install pdo pdo_mysql

# Activer mod_rewrite si tu mets un index ou API
RUN a2enmod rewrite

# Copier ton code dans le container
COPY . /var/www/html/

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Installer les dépendances PHP
WORKDIR /var/www/html
RUN composer install

# Exposer le port utilisé par Apache
EXPOSE 80
