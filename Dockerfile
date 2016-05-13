# Using official php runtime base image
FROM php:5.6-apache

RUN apt-get -yqq update
RUN apt-get -yqq upgrade

# Install reuirements to set up Slim framework environment
RUN apt-get -yqq install curl
RUN apt-get -yqq install git
RUN apt-get -yqq install supervisor
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN cd /var/www/html && composer require slim/slim "^3.4.0"

# Enable mod_rewrite for apache2.2
RUN a2enmod rewrite

# Congigure apache2
ADD slim/.htaccess /var/www/html/.htaccess
ADD slim/slim-apache.conf /etc/apache2/sites-available/000-default.conf

# Add Slim default routing file
ADD slim/index.php /var/www/html/index.php

# Configure supervisord
ADD supervisord/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

EXPOSE 80
CMD ["/usr/bin/supervisord"]
