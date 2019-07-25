FROM php:7.3.6-fpm-alpine3.9 as build-stage
RUN apk update
RUN apk add openssl mysql-client nodejs npm php7-dev php7-pear gcc musl-dev musl unzip libnsl libarchive-tools libaio bash tar unzip g++ && \
	apk add php7-gd && \
	apk add php7-curl ca-certificates && \
	apk upgrade && \
	rm -rf /var/lib/apk/lists/*
RUN docker-php-ext-install pdo pdo_mysql

ENV DOCKERIZE_VERSION v0.6.1
RUN wget https://github.com/jwilder/dockerize/releases/download/$DOCKERIZE_VERSION/dockerize-alpine-linux-amd64-$DOCKERIZE_VERSION.tar.gz \
    && tar -C /usr/local/bin -xzvf dockerize-alpine-linux-amd64-$DOCKERIZE_VERSION.tar.gz \
    && rm dockerize-alpine-linux-amd64-$DOCKERIZE_VERSION.tar.gz

WORKDIR /var/www
RUN rm -rf /var/www/html

RUN apk add composer
# RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
# RUN rm -rf /etc/nginx/conf.d/default.conf
# COPY ./nginx.conf /etc/nginx/conf.d
COPY .docker/api/ /var/www

VOLUME .docker/api/:/var/www
COPY up.sh /var/www
RUN ln -s public html

#RUN composer update --no-plugins --no-scripts
    # && php artisan key:generate \
    # && php artisan cache:clear \
    # && chmod -R 775 storage

#WORKDIR /usr/local/etc/php/conf.d



# ## Prod
# FROM php:7.3.6-fpm-alpine3.9
# RUN apk add --no-cache mysql-client
# RUN docker-php-ext-install pdo pdo_mysql
# WORKDIR /var/www
# RUN rm -rf /var/www/html
# COPY --from=builder /var/www .

EXPOSE 9000
ENTRYPOINT ["php-fpm"]