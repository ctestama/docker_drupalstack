# Docker DrupalStack

A comprehensive local development environment for Drupal.

To Use:
-------

Mac OSX

1. Install Docker for Mac or docker-machine
2. cd into the project root and run 'docker-compose up'

Linux

1. Install Docker
2. cd into the project root and run 'docker-compose up'

##Setting up a local Drupal site installation

1. Clone the site into the www directory
2. Create a .vhost file for it in the sites directory. An easy way to do this is to copy the default.vhost file, rename it, then modify the 'server_name' directive to reflect a custom hostname of your choosing (e.g sitename.dev). Also, modify the 'root' directive to point to the directory of the site you cloned in step 1.
3. Add an entry to the /etc/hosts file of your host machine for your custom host name you chose in step 2. An entry for sitename.dev, for example:

```
0.0.0.0 sitename.dev   
```

4. Create a database for the site 

```
docker exec dstack_mariadb_1 mysql -e "CREATE DATABASE webspark_drupal" -ppassword
```

From here you should be able to do a clean install of the site, or import an existing database. Just make sure that you use the MariaDB container name for the hostname in your mysql configuration. Here's an example from settings.php:

```php
$databases = array (
  'default' => 
  array(
    'default' => 
    array(
      'database' => 'webspark',
      'username' => 'root',
      'password' => 'password',
      'host' => 'mariadb_1',
      'port' => '',
      'driver' => 'mysql',
      'prefix' => '',
    ),
  ),
);

```

## What's inside

* [Nginx](http://nginx.org/)
* [MariaDB](http://www.mariadb.org/)
* [PHP-FPM](http://php-fpm.org/)
* [Memcached](http://memcached.org/)
* [Redis](http://redis.io/)

### Requirements

* [Docker](https://docker.com/)
* [Docker Compose](http://docs.docker.com/compose/)


---
Licensed under the terms of the [MIT License](LICENSE.md).
