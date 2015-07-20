# Camo URL Generator

[![Build Status](https://travis-ci.org/jdreesen/camo-url-generator.svg?branch=master)](https://travis-ci
.org/jdreesen/camo-url-generator)

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

## Credit

Thanks to [Corey Donohoe](https://github.com/atmos) for creating Camo 
and to [cactus](https://github.com/cactus) for the GoLang port of Camo.

## License

All contents of this package are licensed under the [MIT license].

[MIT license]: LICENSE
[camo]: https://github.com/atmos/camo
[go-camo]: https://github.com/cactus/go-camo
