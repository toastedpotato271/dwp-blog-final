#IMAGE
FROM php:8.2-apache

#DEPENDENCIES
RUN apt-get update && apt-get install -y\
git \
unzip \
libzip-dev \
libpng-dev \
libonig-dev \
libxml2-dev \
zip \
curl \
&& docker-php-ext-install pdo_mysql mbstring zip exif pcntl bcmath gd

#COMPOSER
COPY --from=composer:2.7 /usr/bin/composer /usr/bin/COMPOSER

#WORKING
WORKDIR /var/www/hmtl

#PROJECT FILE
COPY . /var/www/html

#PERMISSIONS
RUN chown -R www-data:www-data /var/www/html \
&& chdwon -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

#APACHE
RUN a2enmod rewrite

#PORT 80
EXPOSE 80

#ENVIRONMENT
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public

#CONFIG
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*conf

#LARAVEL
RUN composer install --no-interaction --prefer-dist --optimize-autoloader --no-dev

#ENV
RUN if [! -f .env]; then cp .env.example .env; fi

#START
CMD ["apache2-foreground"]

