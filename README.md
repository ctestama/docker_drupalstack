# Docker DrupalStack

A modified PHPStack capable of running in OSX with docker-machine, forked from https://github.com/kasperisager/phpstack

This version has been reduced from the original to only the esential components for my needs.  I've also swapped out the mysql image to dgraziotin/mysql, which fixes the permissions issues for mounting a persistent mysql volume to /var/lib/mysql in the container.  The mounting works well with the default docker-machine binary, but I've yet to get it working with the Parallels custom docker-machine binary (details on that here:  http://kb.parallels.com/en/123356).  To persist the volume with the default machine, uncomment the two commented lines in the mysql section of the docker-compose.yml file.

The NGINX image Dockerfile has also been modified to install Drush, and Oracle OCI8 for Drupal enterprise development.

## What's inside

* [Nginx](http://nginx.org/)
* [MySQL](http://www.mysql.com/)
* [PHP-FPM](http://php-fpm.org/)
* [HHVM](http://www.hhvm.com/)
* [Memcached](http://memcached.org/)
* [Redis](http://redis.io/)

### Requirements

* [Docker](https://docker.com/)
* [Docker Compose](http://docs.docker.com/compose/)
```

---
Licensed under the terms of the [MIT License](LICENSE.md).
