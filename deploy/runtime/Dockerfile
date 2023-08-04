FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
		libfreetype-dev \
		libjpeg62-turbo-dev \
		libpng-dev \
	&& docker-php-ext-configure gd --with-freetype --with-jpeg \
	&& docker-php-ext-install -j$(nproc) gd \
        && docker-php-ext-install mysqli pdo pdo_mysql \
        && docker-php-ext-enable pdo_mysql

RUN printf "\n" | pecl install redis-5.3.7 \
	&& pecl install xdebug-3.2.1 \
	&& docker-php-ext-enable redis xdebug
