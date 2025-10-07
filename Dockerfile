#generate Dockerfile for php 7.4 with apache
FROM php:7.4-apache
RUN docker-php-ext-install mysqli
RUN docker-php-ext-enable mysqli
COPY . /var/www/html/
EXPOSE 80
CMD ["apache2-foreground"]

