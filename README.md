Translate and Search
=======================

Introduction
------------
This application is a translation application that uses the Zend Framework infrastructure and takes its power from Google Artificial Intelligence.

It also focuses on the words you want to search after translation.

Installation
------------

Using Composer (recommended)
----------------------------
 Clone the repository and manually invoke `composer` using the shipped
`composer.phar`:

    cd my/project/dir
    git clone git://github.com/codedefective/translateandsearch.git
    cd translateandsearch
    php composer.phar self-update
    php composer.phar install

(The `self-update` directive is to ensure you have an up-to-date `composer.phar`
available.)
 
Using Git submodules
----------------------
Alternatively, you can install using native git submodules:

    git clone git://github.com/codedefective/translateandsearch.git --recursive

Web Server Setup
----------------

### PHP CLI Server

The simplest way to get started if you are using PHP 5.4 or above is to start the internal PHP cli-server in the root directory:

    php -S 0.0.0.0:8080 -t public/ public/index.php

This will start the cli-server on port 8080, and bind it to all network
interfaces.

**Note: ** The built-in CLI server is *for development only*.

### Apache Setup

To setup apache, setup a virtual host to point to the public/ directory of the
project and you should be ready to go! It should look something like below:

    <VirtualHost *:80>
        ServerName translateandsearch.localhost
        DocumentRoot /path/to/translateandsearch/public
        SetEnv APPLICATION_ENV "development"
        <Directory /path/to/translateandsearch/public>
            DirectoryIndex index.php
            AllowOverride All
            Order allow,deny
            Allow from all
        </Directory>
    </VirtualHost>
