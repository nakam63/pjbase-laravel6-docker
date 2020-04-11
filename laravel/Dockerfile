FROM php:7.3-fpm-alpine

## add necessary packages.
RUN apk --update add \
    && apk add zlib-dev libzip-dev \
    && docker-php-ext-install pdo_mysql zip

## Install composer.
RUN php -r "copy('https://getcomposer.org/installer', '/tmp/composer-setup.php');" \
    && php -r "if (hash_file('SHA384', '/tmp/composer-setup.php') !== trim(file_get_contents('https://composer.github.io/installer.sig'))) \
                { echo 'ERROR: Invalid installer signature' . PHP_EOL; \
                  unlink('/tmp/composer-setup.php'); \
                  exit(1); \
                }" \
    && php /tmp/composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && php -r "unlink('/tmp/composer-setup.php');"

## Set composer valiables.
ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_HOME /composer
ENV PATH $PATH:/composer/vendor/bin

## Download laravel installer.
# RUN composer global require laravel/installer

## Composer install.
WORKDIR /var/www/laravel
COPY . .
RUN composer update --no-scripts \
    && composer install \
    && composer dump-autoload

EXPOSE 9000