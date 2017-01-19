# RapidUSSD

[![Latest Stable Version](https://poser.pugx.org/leyo/rapidussd/v/stable)](https://packagist.org/packages/leyo/rapidussd)
[![Total Downloads](https://poser.pugx.org/leyo/rapidussd/downloads)](https://packagist.org/packages/leyo/rapidussd)
[![Latest Unstable Version](https://poser.pugx.org/leyo/rapidussd/v/unstable)](https://packagist.org/packages/leyo/rapidussd)
[![License](https://poser.pugx.org/leyo/rapidussd/license)](https://packagist.org/packages/leyo/rapidussd)
[![Monthly Downloads](https://poser.pugx.org/leyo/rapidussd/d/monthly)](https://packagist.org/packages/leyo/rapidussd)
[![Daily Downloads](https://poser.pugx.org/leyo/rapidussd/d/daily)](https://packagist.org/packages/leyo/rapidussd)


Laravel 5 package for rapid USSD prototyping and development
## Install

Via Composer

``` bash
$ composer require leyo/rapidussd

##Migrate the tables
$ php artisan migrate --path=vendor/leyo/rapidussd/src/Http/migrations

##Add service provider
  "leyo\rapidussd\rapidussdServiceProvider::class"
##migrate
$ php artisan migrate

##Seed only if you need sample app
$ php artisan db:seed
```

## Usage


## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email leo@devs.mobi instead of using the issue tracker.

## Credits

- [leyo][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
