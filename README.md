# object-intruder
A small PHP library to access private/protected properties/methods of objects

[![Latest Stable Version](https://poser.pugx.org/duncan3dc/object-intruder/version.svg)](https://packagist.org/packages/duncan3dc/object-intruder)
[![Build Status](https://travis-ci.org/duncan3dc/object-intruder.svg?branch=master)](https://travis-ci.org/duncan3dc/object-intruder)
[![Coverage Status](https://coveralls.io/repos/github/duncan3dc/object-intruder/badge.svg)](https://coveralls.io/github/duncan3dc/object-intruder)


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
$table->privateStuff = "modified";
```

Unfortunatly due to a limitation of [__call](http://php.net/manual/en/language.oop5.overloading.php#object.call) methods with parameters passed by reference are not supported.
However there is a workaround available using the `_call()` method:
```php
$stuff = "start";

$table = new Intruder(new Table);
$table->_call("secretMethod", $stuff, Table::MODIFY);
```


## Changelog
A [Changelog](CHANGELOG.md) has been available since the beginning of time


## Where to get help
Found a bug? Got a question? Just not sure how something works?  
Please [create an issue](//github.com/duncan3dc/object-intruder/issues) and I'll do my best to help out.  
Alternatively you can catch me on [Twitter](https://twitter.com/duncan3dc)
