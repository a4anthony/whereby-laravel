# Whereby-laravel

[![Latest Stable Version](http://poser.pugx.org/a4anthony/whereby-laravel/v)](https://packagist.org/packages/a4anthony/whereby-laravel)
[![Total Downloads](https://poser.pugx.org/a4anthony/whereby-laravel/downloads)](https://packagist.org/packages/a4anthony/whereby-laravel)
[![License](https://poser.pugx.org/a4anthony/whereby-laravel/license)](https://packagist.org/packages/a4anthony/whereby-laravel)


> A Laravel package for the Whereby API

## Installation

To install the package, run the following command in your terminal:

```bash
composer require a4anthony/whereby-laravel
```

Once the package is installed, you need to register the service provider. Open up `config/app.php` and add the following to the `providers` key.

```php
'providers' => [
    ...
    A4Anthony\WherebyLaravel\Providers\WherebyLaravelServiceProvider::class,
    ...
]
```

> If you use **Laravel >= 5.5** you can skip this step and go to [**`configuration`**](https://github.com/a4anthony/whereby-laravel#configuration)

Also, register the Facade like so:

```php
'aliases' => [
    ...
    'WherebyLaravel': A4Anthony/WherebyLaravel/Facades/WherebyLaravel::class
    ...
]
```


## Configuration

You can publish the configuration file using this command:

```bash
php artisan vendor:publish --provider="A4Anthony\WherebyLaravel\Providers\WherebyLaravelServiceProvider"
```

A configuration-file named `whereby-laravel.php` with some sensible defaults will be placed in your `config` directory:

```php
<?php

return [
    /**
     * Whereby API Key
     */
    "api_key" => env("WHEREBY_API_KEY"),

    /**
     * Whereby API Version
     */
    "api_version" => env("WHEREBY_API_VERSION", "v1"),

    /**
     * Whereby API Base URL
     */
    "base_uri" => env("WHEREBY_BASE_URI", "https://api.whereby.dev"),
];
```
