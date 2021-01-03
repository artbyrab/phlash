# PHP Compatability Checks

You can check the compatability of the library for use with a specific PHP version.

## Setup

* Run composer install

```shell
$ composer install
```

## Check the source src/ folder against all PHP versions

* $ vendor/bin/phpcs -p src --standard=PHPCompatibility

## Check the library against a specific version of PHP

* $ vendor/bin/phpcs -p src --standard=PHPCompatibility --runtime-set testVersion 5.4
* $ vendor/bin/phpcs -p src --standard=PHPCompatibility --runtime-set testVersion 7.1

## Resources

* https://github.com/PHPCompatibility/PHPCompatibility
* https://www.sitepoint.com/quick-intro-phpcompatibility-standard-for-phpcs-are-you-php7-ready/