FROM php:7.4-apache 

LABEL mantainer="dead4w"
LABEL name="club_task_calculator"

RUN apt-get update && \
	#install some base extensions
	apt-get install -y \
	        libzip-dev \
	        zip \
	        git \
	  && docker-php-ext-install zip

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR "/var/www"

# Copy web src
COPY ./src/ "/var/www"

# Copy Apache2 configuration
COPY ./apache2/ "/etc/apache2/"

# enable rewrite
RUN a2enmod rewrite

# install vendor
RUN composer validate & composer install

# (dumb security)
RUN chown -R www-data. /var/www/

RUN service apache2 restart

EXPOSE 80/tcp