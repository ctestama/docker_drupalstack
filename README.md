# Dstack

A Docker-powered development environment optimized for Drupal sites.

To Use:
-------

Mac OSX

1. Install Docker for Mac
2. cd into the project root and run 'docker-compose up'

Linux

1. Install Docker
2. cd into the project root and run 'docker-compose up'

Setting up a local Drupal site installation:
--------------------------------------------

1. Clone the site into the www directory
2. Create a .vhost file for it in the sites directory. An easy way to do this is to copy the default.vhost file, rename it, then modify the 'server_name' directive to reflect a custom hostname of your choosing (e.g sitename.dev). Also, modify the 'root' directive to point to the directory of the site you cloned in step 1.
3. Add an entry to the /etc/hosts file of your host machine for the custom host name you chose in step 2. For example:

```
0.0.0.0 sitename.d   
```

4. Create a database for the site 

```
docker exec dstack_mariadb_1 mysql -e "CREATE DATABASE <database-name>" -ppassword
```

From here you should be able to do a clean install of the site, or import an existing database. Just make sure you use the MariaDB container alias for the hostname in your mysql configuration. Here's an example from settings.php:

```php
$databases = array (
  'default' => 
  array(
    'default' => 
    array(
      'database' => 'webspark',
      'username' => 'root',
      'password' => 'password',
      'host' => 'mariadb',
      'port' => '',
      'driver' => 'mysql',
      'prefix' => '',
    ),
  ),
);

```


## Useful BASH aliases and function
```
# set these equal to the web and selenium container names (execute 'docker ps -a' to list containers)
export DWEB=dstack_webserver_1
export DSEL=dstack_selenium_server_1

#stop all containers
alias dstop='docker stop $(docker ps -a -q)'

#remove all containers
alias dremove='docker rm $(docker ps -a -q)'

#remove all images
alias drmi='docker rmi $(docker images -q)'

#ssh into the web container
alias dssh='docker exec -it $DWEB bash'

#ssh into the selenium container
alias dselssh='docker exec -it $DSEL bash'

## What's inside

* [Nginx](http://nginx.org/)
* [MariaDB](http://www.mariadb.org/)
* [PHP-FPM](http://php-fpm.org/)
* [Memcached](http://memcached.org/)
* [Redis](http://redis.io/)

---
Licensed under the terms of the [MIT License](LICENSE.md).
