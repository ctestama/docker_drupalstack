# PHPStack

PHPStack gives you everything you need for developing PHP applications locally. The idea came from the need of having an OS-agnostic and virtualized alternative to the great [MNPP](http://getmnpp.org/) stack as regular LAMP stacks quite simply can't keep up with the Nginx + PHP-FPM/HHVM combo in terms of performance. I hope you'll find it as useful an addition to your dev-arsenal as I've found it!

## What's inside

* [CoreOS](https://coreos.com/) (optional)
*
* [Nginx](http://nginx.org/)
* [MySQL](http://www.mysql.com/)
* [PHP-FPM](http://php-fpm.org/)
* [HHVM](http://www.hhvm.com/)
* [Memcached](http://memcached.org/)
* [Redis](http://redis.io/)

## Getting started

### Requirements

* [Docker](https://docker.com/)
* [Docker Compose](http://docs.docker.com/compose/)
* [Vagrant](http://www.vagrantup.com/) (optional)
* [VirtualBox](https://www.virtualbox.org/) (optional)

### Instructions

```sh
# Clone the repository (using hub)
$ git clone kasperisager/phpstack
$ cd phpstack

# (Optional) Boot up a CoreOS box
$ vagrant up

# Boot up the Docker containers
$ docker-compose up
```

> If you're using the CoreOS box, make sure to set your `DOCKER_HOST` so Docker Compose knows where to boot up the Docker containers.

The IP is in both cases either `127.0.0.1` or your Vagrant IP (`192.168.33.10` by default).

---
Copyright &copy; 2014-2015 [Kasper Kronborg Isager](http://github.com/kasperisager). Licensed under the terms of the [MIT License](LICENSE.md).
