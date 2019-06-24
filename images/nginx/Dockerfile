FROM ubuntu:bionic

ENV DEBIAN_FRONTEND=noninteractive

# Install packages
RUN apt-get update -y
RUN apt-get install -y \
  vim \
  wget \
  php-fpm \
  php-mysql \
  php-gd \
  php-memcached \
  php-curl \
  php-xdebug \
  php-dev \
  php-pear \
  php-ldap \
  php-cli \
  git \
  zip \
  unzip \
  nginx \
  openssh-server \
  rsync \
  supervisor \
  curl


# installs add-apt-repository
RUN apt-get install software-properties-common -y
RUN apt-get update -y

# Create required directories
RUN mkdir -p /var/log/supervisor
RUN mkdir -p /etc/nginx
RUN mkdir -p /var/run/php


# Install Oracle instantclient  ###
ADD oracle/instantclient-basic-linux.x64-12.1.0.2.0.zip /tmp/instantclient-basic-linux.x64-12.1.0.2.0.zip
ADD oracle/instantclient-sdk-linux.x64-12.1.0.2.0.zip /tmp/instantclient-sdk-linux.x64-12.1.0.2.0.zip
ADD oracle/instantclient-sqlplus-linux.x64-12.1.0.2.0.zip /tmp/instantclient-sqlplus-linux.x64-12.1.0.2.0.zip


RUN unzip /tmp/instantclient-basic-linux.x64-12.1.0.2.0.zip -d /usr/local/
RUN unzip /tmp/instantclient-sdk-linux.x64-12.1.0.2.0.zip -d /usr/local/
RUN unzip /tmp/instantclient-sqlplus-linux.x64-12.1.0.2.0.zip -d /usr/local/
RUN ln -s /usr/local/instantclient_12_1 /usr/local/instantclient
RUN ln -s /usr/local/instantclient/libclntsh.so.12.1 /usr/local/instantclient/libclntsh.so
RUN ln -s /usr/local/instantclient/sqlplus /usr/bin/sqlplus

RUN echo /usr/local/instantclient_12_1 > /etc/ld.so.conf.d/oracle-instantclient.conf
RUN ldconfig

RUN apt-get install -y php-dev php-pear build-essential libaio1
RUN pecl channel-update pecl.php.net
RUN echo 'instantclient,/usr/local/instantclient' | pecl install oci8
RUN apt-get clean -y

#Install Composer and Drush
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer global require drush/drush

# Add configuration filess
ADD supervisord.conf /etc/supervisor/conf.d/supervisord.conf
ADD php.ini /etc/php/7.2/fpm/conf.d/40-custom.ini
ADD startup.sh /opt/startup.sh
ADD .bashrc /root/.bashrc

# For supervisor, don't daemonize php-fpm
RUN sed -i 's/;daemonize = yes/daemonize = no/g' /etc/php/7.2/fpm/php-fpm.conf

# Copy the default php-fpm configs to temp directory, so that we can 
# copy them back after mounting the ./php directory
RUN cp -r /etc/php/7.2/fpm /tmp/fpm

# Expose volumes
VOLUME ["/etc/php/7.2/fpm", "/var/www", "/etc/nginx/sites-enabled"]

# Needed for supervisor to startup
RUN service php7.2-fpm start

# Run our startup script
CMD ["/bin/bash", "/opt/startup.sh"]
