#!/bin/bash


if [ ! -f /etc/php/7.4/fpm/php-fpm.conf ]; then
	rsync -ravz /tmp/fpm/* /etc/php/7.4/fpm/
	sleep 5s
fi

#service php7.4-fpm start
/usr/bin/supervisord
