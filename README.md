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
The provided example below, uses the Payload from within a Controller class.

```php
public function index(Request $request)
{
    $users = \App\Models\User::get();

    // As an alternative to "new Payload", you could resolve an instance via your controller's constructor.
    $payload = (new Payload)->setOutput($users)
                   ->withMessages(['success' => 'Operation successful!'])
                   ->withStatus($payload::STATUS_OK);

    return response()->jsonWithPayload($payload);
    // return response()->viewWithPayload('dashboard', $payload, 'users');
}
```
Messages and status are optional. You can use these values in the response you return, however you wish.

To optionally wrap the output with a key, pass the key (string) as the second argument to ```setOutput```:
```php
$payload->setOutput($users, 'data');
```
> If you payload includes 'messages', the output will automatically be wrapped in a json response. If you do not provide a wrapping key, the key 'data' will be used.

### Response Helpers
As seen above, a couple of ResponseFactory macros are available to you, which makes sending payload responses, easier.
For example:
```php
$payload->setOutput($users, 'users')->setMessages(['success' => 'Operation Successful!']);
response()->jsonWithPayload($payload);
```
will yield the following structure:
```json
{
    "users": [
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
The other helper is ```viewWithPayload()```:
```php
response()->viewWithPayload('dashboard', $payload, 'payload');
```
The third argument is the string that you will use to refer to the data in your view. By default, 'payload' is used. Using the following:
```php
$payload->setOutput($users, 'users')->setMessages(['success' => 'Operation Successful!']);
return response()->viewWithPayload('dashboard', $payload);
```
You would access your data as follows:
```html
<h1>{{ $payload->name }}</h1>
<span>{{ $payload->email }}</span>
```
However, you can set the variable name in the following manner:
```php
$payload->setOutput($users, 'users')->setMessages(['success' => 'Operation Successful!']);
return response()->viewWithPayload('dashboard', $payload, 'user');
```
and access your data as follows:
```html
<h1>{{ $user->name }}</h1>
<span>{{ $user->email }}</span>
```

> If you choose not to use the helper methods, refer to the PayloadContract below for the available methods on the Payload instance:
```php
<?php

namespace BrightComponents\Common\Payloads\Contracts;

interface PayloadContract extends Status
{
    /**
     * Set the Payload status.
     *
     * @param  string  $status
     *
     * @return $this
     */
    public function setStatus($status);

    /**
     * Get the status of the payload.
     *
     * @return string
     */
    public function getStatus();

    /**
     * Set the Payload output.
     *
     * @param  mixed  $output
     * @param  string|null  $wrapper
     *
     * @return $this
     */
    public function setOutput($output, ? string $wrapper = null);

    /**
     * Get the Payload output.
     *
     * @return array
     */
    public function getOutput();

    /**
     * Get the unwrapped Payload output.
     *
     * @return array
     */
    public function getUnwrappedOutput();

    /**
     * Set the Payload messages.
     *
     * @param  array  $output
     *
     * @return $this
     */
    public function setMessages(array $messages);

    /**
     * Get messages array from the payload.
     *
     * @return array
     */
    public function getMessages();

    /**
     * Get the wrapper for the output.
     *
     * @return string
     */
    public function getOutputWrapper();

    /**
     * Get the wrapper for messages.
     *
     * @return string
     */
    public function getMessagesWrapper();
}
```

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
