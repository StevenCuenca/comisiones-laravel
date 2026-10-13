FROM php:8.3-apache

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpq-dev \
    && docker-php-ext-install pdo_pgsql \
    && a2enmod rewrite \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY composer.json composer.lock ./

RUN composer install --no-dev --optimize-autoloader --no-interaction --no-scripts

COPY . .

RUN chown -R www-data:www-data storage bootstrap/cache

RUN sed -ri -e 's!/var/www/html!/var/www/html/public!g' \
    /etc/apache2/sites-available/000-default.conf

COPY docker/start.sh /usr/local/bin/start
RUN chmod +x /usr/local/bin/start

ENTRYPOINT ["/usr/local/bin/start"]

CMD ["apache2-foreground"]