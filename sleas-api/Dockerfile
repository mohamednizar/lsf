# Dockerfile for a php:7.2-apache container

FROM php:7.2-apache
RUN docker-php-ext-install mysqli
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN a2enmod rewrite
EXPOSE 80
