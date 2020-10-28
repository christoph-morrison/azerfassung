FROM php:fpm-alpine AS azerfassung-nginx
COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/bin/
RUN install-php-extensions xdebug mongodb
WORKDIR /var/www
CMD ["php-fpm"]
EXPOSE 9000

RUN apt-get update -y && \
    apt-get install git zip unzip curl wget vim -y

RUN echo "xdebug.remote_host = 10.254.254.254"  >> /usr/local/etc/php/conf.d/xdebug.ini
RUN echo "xdebug.idekey = PHPSTORM"             >> /usr/local/etc/php/conf.d/xdebug.ini
RUN echo "xdebug.remote_port = 9001"            >> /usr/local/etc/php/conf.d/xdebug.ini
RUN echo "xdebug.remote_enable = 1"             >> /usr/local/etc/php/conf.d/xdebug.ini
RUN echo "xdebug.remote_autostart = 1"          >> /usr/local/etc/php/conf.d/xdebug.ini
RUN echo "xdebug.default_enable = 1"            >> /usr/local/etc/php/conf.d/xdebug.ini
RUN echo "xdebug.remote_connect_back = 0"       >> /usr/local/etc/php/conf.d/xdebug.ini
RUN echo "xdebug.profiler_enable = 1"           >> /usr/local/etc/php/conf.d/xdebug.ini

# Install phpcs
WORKDIR /usr/local/bin
RUN apt-get install wget && \
    wget https://squizlabs.github.io/PHP_CodeSniffer/phpcs.phar && \
    echo 'php /usr/local/bin/phpcs.phar $*' >> phpcs && \
    chmod +x phpcs

# Install phpcbf
RUN wget https://squizlabs.github.io/PHP_CodeSniffer/phpcbf.phar && \
    echo 'php /usr/local/bin/phpcbf.phar $*' >> phpcbf && \
    chmod +x phpcbf

# Install phpmd
RUN wget -c https://phpmd.org/static/latest/phpmd.phar && \
    echo 'php /usr/local/bin/phpmd.phar $*' >> phpmd && \
    chmod +x phpmd

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer