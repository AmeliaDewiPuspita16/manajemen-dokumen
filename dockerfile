FROM php:8.2-apache

RUN docker-php-ext-install mysqli

RUN echo "DirectoryIndex index.php" >> /etc/apache2/apache2.conf

COPY . /var/www/html/

EXPOSE 80