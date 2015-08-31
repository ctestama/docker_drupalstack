# PHPStack

A modified phpstack, capable of running in OSX with docker-machine. 

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

### Instructions for docker-machine

```sh
# Clone the repository
$ git clone ctestama/phpstack
$ cd phpstack

# (Optional) Boot up a CoreOS box
$ vagrant up

# Boot up the Docker containers
$ docker-compose up
```

---
Copyright &copy; 2014-2015 [Kasper Kronborg Isager](http://github.com/kasperisager). Licensed under the terms of the [MIT License](LICENSE.md).
