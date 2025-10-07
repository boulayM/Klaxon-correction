# Étape 1 : Utiliser une image de base PHP avec Apache
FROM php:8.2-apache

# Étape 2 : Installer les extensions PHP nécessaires
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Étape 3 : Copier les fichiers de l'application dans le conteneur
COPY ./App /var/www/html

# Étape 4 : Donner les permissions nécessaires
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Étape 5 : Exposer le port 80 pour le serveur web
EXPOSE 80

# Étape 6 : Commande par défaut pour démarrer Apache
CMD ["apache2-foreground"]
