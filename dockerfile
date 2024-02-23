FROM php:8.3.3-apache

RUN apt-get update && \
	apt-get install -y libxml2-dev

RUN docker-php-ext-install soap

COPY ./ /var/www/html/
