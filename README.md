# object-intruder
A small PHP library to access private/protected properties/methods of objects

[![Build Status](https://img.shields.io/travis/duncan3dc/object-intruder.svg)](https://travis-ci.org/duncan3dc/object-intruder)
[![Latest Version](https://img.shields.io/packagist/v/duncan3dc/object-intruder.svg)](https://packagist.org/packages/duncan3dc/object-intruder)


## Installation

The recommended method of installing this library is via [Composer](//getcomposer.org/).

Run the following command from your project root:

```bash
$ composer require duncan3dc/object-intruder
```


## Usage


```php
use duncan3dc\ObjectIntruder\Intruder;

$table = new Intruder(new Table);
$table->secretMethodNotPublic("Hello", "World");
```


## Changelog
A [Changelog](CHANGELOG.md) has been available since the beginning of time


## Where to get help
Found a bug? Got a question? Just not sure how something works?  
Please [create an issue](//github.com/duncan3dc/object-intruder/issues) and I'll do my best to help out.  
Alternatively you can catch me on [Twitter](https://twitter.com/duncan3dc)
