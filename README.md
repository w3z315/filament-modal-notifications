# Shows dismissable modal notifications to users when they sign in.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/w3z315/filamentphp-modal-notifications.svg?style=flat-square)](https://packagist.org/packages/w3z315/filamentphp-modal-notifications)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/w3z315/filamentphp-modal-notifications/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/w3z315/filamentphp-modal-notifications/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/w3z315/filamentphp-modal-notifications/fix-php-code-styling.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/w3z315/filamentphp-modal-notifications/actions?query=workflow%3A"Fix+PHP+code+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/w3z315/filamentphp-modal-notifications.svg?style=flat-square)](https://packagist.org/packages/w3z315/filamentphp-modal-notifications)



This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require w3z315/filamentphp-modal-notifications
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="filamentphp-modal-notifications-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="filamentphp-modal-notifications-config"
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="filamentphp-modal-notifications-views"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage

```php
$modalNotifications = new W3z315\ModalNotifications();
echo $modalNotifications->echoPhrase('Hello, W3z315!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Alexander Michler](https://github.com/w3z315)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
