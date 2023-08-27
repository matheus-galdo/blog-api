FROM php:7.2-alpine3.8

# RUN apk add --no-cache add postgresql-libs libpq-dev \
#     && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql

RUN set -ex \
	&& apk --no-cache add postgresql-libs postgresql-dev \
	&& docker-php-ext-install pgsql pdo_pgsql \
	&& apk del postgresql-dev

RUN docker-php-ext-install pdo sockets

RUN curl -sS https://getcomposer.org/installer | php -- \
     --install-dir=/usr/local/bin --filename=composer

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . .

CMD [ "php composer install" ]