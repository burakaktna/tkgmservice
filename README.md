# Very short description of the package

[![Latest Version on Packagist](https://img.shields.io/packagist/v/burakaktna/tkgmservice.svg?style=flat-square)](https://packagist.org/packages/burakaktna/tkgmservice)
[![Build Status](https://img.shields.io/travis/burakaktna/tkgmservice/master.svg?style=flat-square)](https://travis-ci.org/burakaktna/tkgmservice)
[![Quality Score](https://img.shields.io/scrutinizer/g/burakaktna/tkgmservice.svg?style=flat-square)](https://scrutinizer-ci.com/g/burakaktna/tkgmservice)
[![Total Downloads](https://img.shields.io/packagist/dt/burakaktna/tkgmservice.svg?style=flat-square)](https://packagist.org/packages/burakaktna/tkgmservice)

This is where your description should go. Try and limit it to a paragraph or two, and maybe throw in a mention of what PSRs you support to avoid any confusion with users and contributors.

## Installation

You can install the package via composer:

```bash
composer require burakaktna/tkgmservice
```

## Usage

Print the list of provinces.

```php
<?php
require_once 'vendor/autoload.php';

use Burakaktna\TKGMService;

$tkgmService = new TKGMService();
$provinces   = $tkgmService->getProvinces()->submit();

print_r($provinces);
?>
```

Print the list of districts

```php
<?php
require_once 'vendor/autoload.php';

use Burakaktna\TKGMService;

$tkgmService = new TKGMService();
$districts   = $tkgmService->getDistricts(int $districtId)->submit();

print_r($districts);
?>
```

Print the list of neighborhoods

```php
<?php
require_once 'vendor/autoload.php';

use Burakaktna\TKGMService;

$tkgmService   = new TKGMService();
$neighborhoods = $tkgmService->getNeighborhoods(int $districtId)->submit();

print_r($neighborhoods);
?>
```

Parcel inquiry

```php
<?php
require_once 'vendor/autoload.php';

use Burakaktna\TKGMService;

$tkgmService = new TKGMService();
$parcel      = $tkgmService->parcelInquiry(int $neighborhoodId, int $bobId, int $parcelId)->submit();

print_r($neighborhoods);
?>
```

Also you can see more examples in examples folder.

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email burak@kodmunity.com instead of using the issue tracker.

## Credits

- [Muhammed Burak AKTUNA](https://github.com/burakaktna)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
