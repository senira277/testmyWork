FROM php:8.3-fpm-alpine

RUN docker-php-ext-install mysqli pdo pdo_mysql 

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer

RUN apk --no-cache --update add apache2 php83-apache2
RUN sed -i 's#AllowOverride None#AllowOverride All#' /etc/apache2/httpd.conf
RUN echo "LoadModule rewrite_module modules/mod_rewrite.so" >> /etc/apache2/httpd.conf
RUN rm -rf /var/www/html /var/www/localhost

WORKDIR /var/www/localhost/htdocs
COPY . .
RUN composer install --no-dev --optimize-autoloader

EXPOSE 80

ENTRYPOINT [ "httpd", "-DFOREGROUND" ] 
