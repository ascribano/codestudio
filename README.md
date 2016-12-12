# Technical Assessment - Armando Scribano

## Introduction

This is a technical assessment I have created for BurstSMS.

## Requirements

* PHP 5.6 - module curl installed
* Composer

## Library Installation

run Composer update and composer update in order to install the vendors library.

## Web server setup

### Apache setup

To setup apache, setup a virtual host to point to the public/ directory of the
project and you should be ready to go! It should look something like below:

```apache
<VirtualHost *:80>
    ServerName burstsms.dev
    DocumentRoot /path/to/burstsms/public
    <Directory /path/to/burstsms/public>
        DirectoryIndex index.php
        AllowOverride All
        Order allow,deny
        Allow from all
        <IfModule mod_authz_core.c>
        Require all granted
        </IfModule>
    </Directory>
</VirtualHost>
```

### Nginx setup

To setup nginx, open your `/path/to/nginx/nginx.conf` and add an
[include directive](http://nginx.org/en/docs/ngx_core_module.html#include) below
into `http` block if it does not already exist:

```nginx
http {
    # ...
    include sites-enabled/*.conf;
}
```


Create a virtual host configuration file for your project under `/path/to/nginx/sites-enabled/burstsms.localhost.conf`
it should look something like below:

```nginx
server {
    listen       80;
    server_name  burstsms.localhost;
    root         /path/to/burstsms/public;

    location / {
        index index.php;
        try_files $uri $uri/ @php;
    }

    location @php {
        # Pass the PHP requests to FastCGI server (php-fpm) on 127.0.0.1:9000
        fastcgi_pass   127.0.0.1:9000;
        fastcgi_param  SCRIPT_FILENAME /path/to/burstsms/public/index.php;
        include fastcgi_params;
    }
}
`