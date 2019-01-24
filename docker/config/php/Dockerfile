FROM php:7.0-fpm

WORKDIR /var/www/

RUN apt-get update

RUN apt-get install -y python-software-properties

RUN apt-get install -y curl libcurl4-openssl-dev
RUN docker-php-ext-install curl
RUN docker-php-ext-enable curl

RUN docker-php-ext-install json
RUN docker-php-ext-enable json

RUN docker-php-ext-install pdo
RUN docker-php-ext-enable pdo

RUN apt-get install -y libpq-dev
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-enable pdo_mysql

RUN docker-php-ext-install pdo_mysql

RUN docker-php-ext-install pdo_pgsql
RUN docker-php-ext-enable pdo_pgsql

RUN docker-php-ext-install pgsql

RUN pecl install redis
RUN docker-php-ext-enable redis

RUN docker-php-ext-install zip

RUN apt-get install -y supervisor
RUN apt-get install -y git unzip

RUN buildRequirements="libxml2-dev" \
	&& apt-get update && apt-get install -y ${buildRequirements} \
	&& docker-php-ext-install soap \
	&& apt-get purge -y ${buildRequirements} \
	&& rm -rf /var/lib/apt/lists/*

RUN apt-get update && apt-get install -y python-pip && pip install superlance

RUN apt-get update

RUN apt-get install gettext -y
RUN docker-php-ext-install gettext
RUN docker-php-ext-enable gettext

RUN apt-get install curl -y
RUN docker-php-ext-install curl
RUN docker-php-ext-enable curl

RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        libpng-dev \
    && docker-php-ext-install -j$(nproc) iconv mcrypt \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd

RUN apt-get install -y libxml2-dev
RUN docker-php-ext-install xml
RUN docker-php-ext-enable xml

RUN docker-php-ext-install xmlrpc
RUN docker-php-ext-enable xmlrpc

RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
RUN ln -sf /dev/stdout /var/log/fpm-access.log && \
    ln -sf /dev/stderr /var/log/fpm-php.www.log

RUN php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer

RUN pecl install xdebug-2.5.0 \ && docker-php-ext-enable xdebug

RUN usermod -u 1000 www-data
#
###Enable remote SSH connetction
#RUN apt-get install -y openssh-server
#RUN mkdir /var/run/sshd
#RUN echo 'root:root2' > /root/passwdfile
#RUN cat /root/passwdfile | chpasswd
#RUN sed -i 's/^#*\(PermitRootLogin\) .*/\1 yes/' /etc/ssh/sshd_config
#
#RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
#
#EXPOSE 22
#CMD /usr/sbin/sshd -D & /usr/local/sbin/php-fpm --nodaemonize

WORKDIR /var/www
