FROM php:7.1-fpm

MAINTAINER Leo Tavares <leovant@gmail.com>

# Parameters
ENV PHP_MEMORY_LIMIT=512M \
    MAX_UPLOAD=50M \
    PHP_MAX_FILE_UPLOAD=200 \
    PHP_MAX_POST=100M \
    PHALCON_VERSION=3.2.1

# Install useful tools
RUN apt-get update -y && apt-get -y install git vim cron

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install Phalcon dependencies
RUN docker-php-ext-install -j$(nproc) gettext

# Install Phalcon
RUN cd /tmp \
    && curl -sSLO https://codeload.github.com/phalcon/cphalcon/tar.gz/v$PHALCON_VERSION \
    && tar xvzf v$PHALCON_VERSION \
    && cd cphalcon-$PHALCON_VERSION/build \
    && ./install \
    && echo "extension=phalcon.so" > /usr/local/etc/php/conf.d/phalcon.ini \
    && apt-get autoremove -y \
    && apt-get autoclean -y \
    && apt-get clean -y \
    && rm -rf /tmp/*

# TODO: Tune up PHP FPM
# Tune up PHP
RUN TIMEZONE=`cat /etc/timezone` && \
    echo "date.timezone = ${TIMEZONE}" >> /usr/local/etc/php/conf.d/zz-tune.ini && \
    echo "memory_limit = ${PHP_MEMORY_LIMIT}" >> /usr/local/etc/php/conf.d/zz-tune.ini && \
    echo "upload_max_filesize = ${MAX_UPLOAD}" >> /usr/local/etc/php/conf.d/zz-tune.ini && \
    echo "max_file_uploads = ${PHP_MAX_FILE_UPLOAD}" >> /usr/local/etc/php/conf.d/zz-tune.ini && \
    echo "max_file_uploads = ${PHP_MAX_POST}" >> /usr/local/etc/php/conf.d/zz-tune.ini && \
    echo "short_open_tag = On" >> /usr/local/etc/php/conf.d/zz-tune.ini && \
    echo "error_reporting = -1" >> /usr/local/etc/php/conf.d/zz-tune.ini && \
    echo "display_errors = On" >> /usr/local/etc/php/conf.d/zz-tune.ini && \
    echo "display_startup_errors = On" >> /usr/local/etc/php/conf.d/zz-tune.ini
     