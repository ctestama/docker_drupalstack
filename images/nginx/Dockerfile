FROM ubuntu:latest

#ENV DEBIAN_FRONTEND=noninteractive

# Only use stable sources
# RUN rm -rf /etc/apt/sources.list.d/proposed.list

# Install packages
RUN apt-get update
RUN apt-get install -y \
  supervisor \
  curl \
  vim \
  wget \
  php-fpm \
  php-mysql \
  php-mcrypt \
  php-gd \
  php-memcached \
  php-curl \
  php-xdebug \
  php-dev \
  php-pear \
  php7.0-ldap \
  unzip \
  nginx


# installs add-apt-repository
RUN apt-get install software-properties-common -y
RUN apt-key adv --recv-keys --keyserver hkp://keyserver.ubuntu.com:80 0x5a16e7281be7a449
RUN add-apt-repository "deb http://dl.hhvm.com/ubuntu $(lsb_release -sc) main"
RUN apt-get update -y
RUN apt-get install hhvm -y 


# Create required directories
RUN mkdir -p /var/log/supervisor
RUN mkdir -p /etc/nginx
RUN mkdir -p /var/run/php
RUN mkdir -p /var/run/hhvm
RUN chown -R www-data:www-data /var/run/hhvm
RUN chmod g+s /var/run/hhvm


# Oracle instantclient
ADD oracle/instantclient-basic-linux.x64-12.1.0.2.0.zip /tmp/instantclient-basic-linux.x64-12.1.0.2.0.zip
ADD oracle/instantclient-sdk-linux.x64-12.1.0.2.0.zip /tmp/instantclient-sdk-linux.x64-12.1.0.2.0.zip
ADD oracle/instantclient-sqlplus-linux.x64-12.1.0.2.0.zip /tmp/instantclient-sqlplus-linux.x64-12.1.0.2.0.zip


RUN unzip /tmp/instantclient-basic-linux.x64-12.1.0.2.0.zip -d /usr/local/
RUN unzip /tmp/instantclient-sdk-linux.x64-12.1.0.2.0.zip -d /usr/local/
RUN unzip /tmp/instantclient-sqlplus-linux.x64-12.1.0.2.0.zip -d /usr/local/
RUN ln -s /usr/local/instantclient_12_1 /usr/local/instantclient
RUN ln -s /usr/local/instantclient/libclntsh.so.12.1 /usr/local/instantclient/libclntsh.so
RUN ln -s /usr/local/instantclient/sqlplus /usr/bin/sqlplus

RUN apt-get install libaio-dev -y
RUN echo 'instantclient,/usr/local/instantclient' | pecl install oci8
RUN apt-get clean -y

#Install Drush
RUN apt-get install drush -y

# Add configuration filess
ADD supervisord.conf /etc/supervisor/conf.d/supervisord.conf
ADD php.ini /etc/php/7.0/fpm/conf.d/40-custom.ini
ADD server.ini /etc/hhvm/server.ini

# Expose volumes
VOLUME ["/var/www", "/etc/nginx/sites-enabled"]

EXPOSE 80 9000

RUN sed -i 's/;daemonize = yes/daemonize = no/g' /etc/php/7.0/fpm/php-fpm.conf
RUN service php7.0-fpm start

CMD ["/usr/bin/supervisord"]
