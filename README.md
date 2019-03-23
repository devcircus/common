# Bright Components - Common Components
### Common components for BrightComponents pacakges.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/bright-components/common.svg)](https://packagist.org/packages/bright-components/common)
[![Build Status](https://img.shields.io/travis/bright-components/common/master.svg)](https://travis-ci.org/bright-components/common)
[![Quality Score](https://img.shields.io/scrutinizer/g/bright-components/common.svg)](https://scrutinizer-ci.com/g/bright-components/common)
[![Total Downloads](https://img.shields.io/packagist/dt/bright-components/common.svg)](https://packagist.org/packages/bright-components/common)

![Bright Components](https://s3.us-east-2.amazonaws.com/bright-components/bc_large.png "Bright Components")

### Disclaimer
The packages under the BrightComponents namespace are basically a way for me to avoid copy/pasting simple functionality that I like in all of my projects. There's nothing groundbreaking here, just a little extra functionality for form requests, controllers, custom rules, services, etc.

The package contains classes, interfaces, etc. that may be common among other BrightComponents packages.

## Installation
You can install the package via composer:

```bash
composer require bright-components/common
```

Laravel versions > 5.6.0 will automatically identify and register the service provider.
If you have this functionality disabled, add the package service provider to your config/app.php file, in the 'providers' array:
```php
'providers' => [
    //...
    BrightComponents\Common\BrightComponentsServiceProvider::class,
    //...
];
```

## Usage
Currently, the 'common' package simply provides a Payload class and a couple of ResponseFactory macros to help convert the Payload into either a json response or return a view with the payload data.
Payloads can be used as follows:

```php
public function index(Request $request)
{
    $users = \App\Models\User::get();

    $payload = (new Payload)->withInput($request->ids)
                   ->withOutput($users)
                   ->withMessages(['success' => 'Operation successful!'])
                   ->withStatus($payload::STATUS_OK);

    return; // you can access the output, messages, and the input with the 'getOutput', 'getMessages', and 'getInput' methods, and use these values in your response.
}
```
> The ```withOutput``` methods can receive any type(eg. strings, ints, Collections, Eloquent Collections, arrays, objects), which will be converted to an output array.

The input, output, messages, and status are all optional according to your needs. You can use these values in the response you return, however you wish.
By default, each of these values are wrapped in an array with the following keys:

- 'input': 'input'
- 'output': 'data',
- 'messages': 'messages'

You can set the 'key' for each, using the following methods:
```wrapInput(string $wrapper)```
```wrapOutput(string $wrapper)```
```wrapMessages(string $wrapper)```

The values for input, output, and messages can be retrieved using the following methods:
```getInput()```
```getOutput()```
```getMessages()```

If you prefer not to wrap these values, you may pass false as the second parameter to the ```withInput``` ```withOutput``` and ```withMessages``` methods.
```php
    $payload = (new Payload)->withInput($request->ids, $false)
                   ->withOutput($users, $false)
                   ->withMessages(['success' => 'Operation successful!'], $false)
                   ->withStatus($payload::STATUS_OK);
```

The items in the 'output' array are available on the Payload instance via the magic __get method. So, if you choose to pass the Payload to your view, you can access the items from the output as follows:
```html
<h1>{{ $payload->name }}</h1>
<span>{{ $payload->email }}</span>
```

### Response Helpers
A couple of ResponseFactory macros are available to you, which makes sending payload responses, easier.
For example:
```php
response()->jsonWithPayload($payload, $withInput = false);
```
will yield the following structure (with the default keys):
```json
{
    "data": [
        {
            "id": 1,
            "name": "Clayton Stone",
            "email": "clay@test.com",
            "email_verified_at": "2019-03-18 20:29:26",
            "created_at": "2019-03-18 20:29:26",
            "updated_at": "2019-03-18 20:29:26"
        },
        {
            "id": 2,
            "name": "John Doe",
            "email": "john15@gmail.com",
            "email_verified_at": "2019-03-23 18:20:11",
            "created_at": "2019-03-23 18:19:41",
            "updated_at": "2019-03-23 18:20:16"
        }
    ],
    "messages": {
        "success": "Operation successful!"
    }
}
```
> Just pass true as the second argument to ```jsonWithPayload()``` if you would like to include the input in your response.

The other helper is ```viewWithPayload()```:
```php
response()->viewWithPayload('dashboard', $payload, $key = 'payload');
```
The default key that is passed to the view is 'payload', so you would access the data in your view as follows:
```html
<h1>{{ $payload->name }}</h1>
<span>{{ $payload->email }}</span>
```
> To change the variable name, pass the name as a third argument to ```viewWithPayload``` method.

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email clay@phpstage.com instead of using the issue tracker.

## Roadmap

We plan to work on flexibility/configuration soon, as well as release a framework agnostic version of the package.

## Credits

- [Clayton Stone](https://github.com/devcircus)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
