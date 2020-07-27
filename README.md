# Alphacon [![Latest Stable Version](https://poser.pugx.org/midnite81/alphacon/version)](https://packagist.org/packages/midnite81/alphacon) [![Total Downloads](https://poser.pugx.org/midnite81/alphacon/downloads)](https://packagist.org/packages/midnite81/alphacon) [![Latest Unstable Version](https://poser.pugx.org/midnite81/alphacon/v/unstable)](https://packagist.org/packages/midnite81/alphacon) [![License](https://poser.pugx.org/midnite81/alphacon/license.svg)](https://packagist.org/packages/midnite81/alphacon) [![Build](https://travis-ci.org/midnite81/alphacon.svg?branch=master)](https://travis-ci.org/midnite81/alphacon) [![Coverage Status](https://coveralls.io/repos/github/midnite81/alphacon/badge.svg?branch=master)](https://coveralls.io/github/midnite81/alphacon?branch=master)

Alphacon (or AlphabetConversion) converts characters in strings into different formats 
such as Nato Strings or Morse Code. The code has been designed in a way that you can 
add your own dictionaries which will convert individual characters within a string.

## Current Dictionaries

- Nato
- Morse Code

## Installation

This package requires PHP 7.4+, and includes a Laravel 5+ Service Provider and Facade.

To install through composer include the package in your composer.json.

`"midnite81/alphacon": "^1.0"`

then run composer install or composer update to download the dependencies, alternatively 
you can run `composer require midnite81/alphacon`.

## Laravel Service Provider

If you are installing this for use with Laravel, the package will be auto discovered if 
you are using Laravel 5.5 or greater, otherwise please register 
`\Midnite81\Alphacon\AlphaconServiceProvider::class` within your `config/app.php`

```php
'providers' => [

  \Midnite81\Alphacon\AlphaconServiceProvider::class
          
];
```

## Usage

Depending on whether you are using this with Laravel will vary this guide on usage. Please
select the appropriate guide below;

- [I'm using this with Laravel](usage-laravel.md)
- [I'm not using this with Laravel](usage-php.md)

## Contributions

I'm very open to adding in dictionaries into this package where they serve a general 
purpose and would be useful to other people. If you wish to contribute, please feel 
free to raise a Pull Request. Please allow 5 days, often sooner, to check through
your PR and merge where possible. 