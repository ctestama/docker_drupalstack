#!/bin/bash


if [ ! -f /etc/php/7.0/fpm/php-fpm.conf ]; then
	rsync -ravz /tmp/fpm/* /etc/php/7.0/fpm/
	sleep 5s
fi

#service php7.0-fpm start
/usr/bin/supervisord