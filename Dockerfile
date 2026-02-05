# Utiliser l'image officielle PHP avec Apache
FROM php:8.2-apache

# Copier le projet dans le dossier web d'Apache
COPY . /var/www/html/

# Assurer les permissions correctes
RUN chown -R www-data:www-data /var/www/html

# Exposer le port HTTP
EXPOSE 80

# Démarrer Apache en mode premier plan
CMD ["apache2-foreground"]