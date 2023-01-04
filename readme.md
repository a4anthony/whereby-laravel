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

## Usage

Open your .env file and add your public key, secret key, merchant email and payment url like so:

```php
WHEREBY_API_KEY=xxxxxxxxxxxxx
WHEREBY_API_VERSION=xxxxxxxxxxxxx
WHEREBY_WEBHOOK_SECRET=xxxxxxxxxxxxx
```

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use WherebyLaravel;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            "isLocked" => false,
            "startDate" => "2020-10-10T10:10:10Z",
            "endDate" => "2023-10-10T10:10:10Z",
        ];
        $meeting = WherebyLaravel::createMeeting($data); // Create a meeting
        dd($meeting);
    }
}
```

Let me explain the fluent methods this package provides a bit here.


```php
/**
* Creates a new meeting
* 
* @param array $data [see https://whereby.dev/http-api/#/paths/~1meetings/post]
*/
WherebyLaravel::createMeeting($data);


/**
* Retrieves a meeting
* 
* @param string $meetingId [see https://whereby.dev/http-api/#/paths/~1meetings/post]
*/
WherebyLaravel::getMeeting($meetingId);


/**
* Retrieves an event from webhook
* 
* [see https://docs.whereby.com/monitoring-usage/webhooks]
*/
WherebyLaravel::webhook();
```

## Contributing

Please feel free to fork this package and contribute by submitting a pull request to enhance the functionalities.

## How can I thank you?

Why not star the github repo? I'd love the attention! Why not share the link for this repository on Twitter or HackerNews? Spread the word!

Don't forget to [follow me on twitter](https://twitter.com/a4anthony_)!

Thanks!
Anthony Akro.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
