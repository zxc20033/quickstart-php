FROM php:5.6-apache

RUN apt-get update
RUN apt-get upgrade -y

RUN apt-get -y install curl git vim supervisor
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN cd /var/www/html && composer require slim/slim "^3.0"

RUN rm -rf /var/www/html/index.html

RUN a2enmod rewrite

ADD slim/.htaccess /var/www/html/.htaccess
ADD slim/index.php /var/www/html/index.php
ADD slim/slim-apache.conf /etc/apache2/sites-available/000-default.conf

ADD supervisord/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

EXPOSE 80
CMD ["/usr/bin/supervisord"]
