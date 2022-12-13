FROM php:8.1-apache

ENV http_proxy http://172.25.1.1:8080
ENV https_proxy http://172.25.1.1:8080

RUN apt-get update && apt-get install -qqy git unzip libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        libaio1 wget && apt-get clean autoclean && apt-get autoremove --yes &&  rm -rf /var/lib/{apt,dpkg,cache,log}/

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN wget https://get.symfony.com/cli/installer -O - | bash

RUN mv /root/.symfony5/bin/symfony /usr/local/bin/symfony

RUN pear config-set http_proxy http://172.25.1.1:8080
RUN pecl install mongodb && docker-php-ext-enable mongodb
RUN echo "extension=mongodb.so" >> /usr/local/etc/php/php.ini

CMD cd /var/www/html/mountain-bird && composer install  && symfony server:start