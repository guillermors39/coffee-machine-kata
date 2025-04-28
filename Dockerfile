FROM php:8.2-cli AS base


RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    && rm -rf /var/lib/apt/lists/*


RUN docker-php-ext-install zip && \
    pecl install xdebug && \
    docker-php-ext-enable xdebug zip


RUN echo "xdebug.mode=coverage,debug" >> /usr/local/etc/php/conf.d/xdebug.ini && \
    echo "xdebug.start_with_request=yes" >> /usr/local/etc/php/conf.d/xdebug.ini


COPY --from=composer:2 /usr/bin/composer /usr/bin/composer


COPY entrypoint.sh /usr/local/bin/entrypoint
RUN chmod +x /usr/local/bin/entrypoint

WORKDIR /app

ENTRYPOINT ["entrypoint"]
CMD ["phpunit"]