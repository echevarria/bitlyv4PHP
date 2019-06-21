# URL Shortener - bit.ly v4 API - PHP

[![Minimum PHP Version](https://img.shields.io/badge/PHP-%3E%3D%207.1-blue.svg)](https://packagist.org/packages/echevarria/bitlyv4php)
[![Latest Unstable Version](https://img.shields.io/badge/version-v1.0.0-orange.svg)](https://packagist.org/packages/echevarria/bitlyv4php)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

A simple Bitly URL Shortener.

PHP Library based on Guzzle to generate short links using Bit.ly API V4

## Installing

The recommended way to install this library is through
[Composer](http://getcomposer.org).

```bash
# Install Composer
curl -sS https://getcomposer.org/installer | php
```

Next, run the Composer command to install:

```bash
php composer.phar require echevarria/bitlyv4php:dev-master
```

After installing, you need to require Composer's autoloader:

```php
require 'vendor/autoload.php';
```

## Shortening a link

```php
use Echevarria\Bitly\Bitly;

$token = 'yourBitlyToken';

$bitly = new Bitly($token);

$short = $bitly->shorten('https://long-url.com');
```
