# Camo URL Generator

[![Build Status](https://travis-ci.org/jdreesen/camo-url-generator.svg?branch=master)](https://travis-ci.org/jdreesen/camo-url-generator)
[![License](https://poser.pugx.org/jdreesen/camo-url-generator/license)](https://packagist.org/packages/jdreesen/camo-url-generator)

A PHP library that generates camouflaged URLs for usage with [camo] or [go-camo] TLS image proxy.

## Installation

Just run

    $ composer require jdreesen/camo-url-generator

## Example

```php
use Dreesen\Image\HexCamo;
use Dreesen\Image\HttpOnlyCamo;

$camo = new HttpOnlyCamo(new HexCamo('https://img.example.org', 'secret'));

echo $camo->camouflage('http://example.org/image.jpg');
```

The `secret` is the same HMAC key you used on your camo server instance running on `https://img.example.org`.

## What's inside?

* `Dreesen\Image\Camo`: Interface for your type-hinting which is implemented by all the following classes.
* `Dreesen\Image\HexCamo`: Generates URLs for usage with the [camo] or [go-camo] image proxy in HEX format.
* `Dreesen\Image\Base64Camo`: Generates URLs for usage with the [go-camo] image proxy in Base64 format.
* `Dreesen\Image\QueryStringCamo`: Generates URLs for usage with the [camo] image proxy in query string format.
* `Dreesen\Image\HttpOnlyCamo`: Decorator to only camouflage HTTP (non-secure) URLs.
* `Dreesen\Image\NoCamo`: Disables image camouflage by returning given URLs as they are.

## Credit

Thanks to [Corey Donohoe](https://github.com/atmos) for creating Camo 
and to [cactus](https://github.com/cactus) for the GoLang port of Camo.

## License

All contents of this package are licensed under the [MIT license].

[MIT license]: LICENSE
[camo]: https://github.com/atmos/camo
[go-camo]: https://github.com/cactus/go-camo
