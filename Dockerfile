# Utiliser l'image officielle PHP
FROM php:8.2-apache

# Installer extensions nécessaires
RUN docker-php-ext-install pdo pdo_mysql

# Activer mod_rewrite si tu mets un index ou API
RUN a2enmod rewrite

# Copier tout le code
COPY . /var/www/html/

# Installer Composer si ce n'est pas déjà fait
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Installer les dépendances PHP (même si vendor est déjà présent, ça assure la cohérence)
RUN composer install


# Exposer le port utilisé par Apache
EXPOSE 80
