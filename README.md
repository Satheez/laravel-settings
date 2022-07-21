
[<img src="https://github-ads.s3.eu-central-1.amazonaws.com/support-ukraine.svg?t=1" />](https://supportukrainenow.org)

# Laravel Settings

[![Latest Version on Packagist](https://img.shields.io/packagist/v/satheez/laravel-settings.svg?style=flat-square)](https://packagist.org/packages/satheez/laravel-settings)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/satheez/laravel-settings/run-tests?label=tests)](https://github.com/satheez/laravel-settings/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/satheez/laravel-settings/Check%20&%20fix%20styling?label=code%20style)](https://github.com/satheez/laravel-settings/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/satheez/laravel-settings.svg?style=flat-square)](https://packagist.org/packages/satheez/laravel-settings)

This package is used get & set data by using dedicated database table

## Installation

You can install the package via composer:

```bash
composer require satheez/laravel-settings
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="laravel-settings-migrations"
php artisan migrate
```

## Usage

### Set settings data

```php
// Method 1
settings(['foo' => 'bar']);

// Method 2
settings_set('foo', 'bar');
```

### Get settings data

```php
// Method 1
settings('foo'); // output: bar

// Method 2
settings_get('foo'); // output: bar
```

## Testing

```bash
composer test
```

## Credits

- [Satheez](https://github.com/Satheez)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
