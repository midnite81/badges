# Badges [![Latest Stable Version](https://poser.pugx.org/midnite81/badges/version)](https://packagist.org/packages/midnite81/badges) [![Total Downloads](https://poser.pugx.org/midnite81/badges/downloads)](https://packagist.org/packages/midnite81/badges) [![Latest Unstable Version](https://poser.pugx.org/midnite81/badges/v/unstable)](https://packagist.org/packages/midnite81/badges) [![License](https://poser.pugx.org/midnite81/badges/license.svg)](https://packagist.org/packages/midnite81/badges) [![Build](https://travis-ci.org/midnite81/badges.svg?branch=master)](https://travis-ci.org/midnite81/badges) [![Coverage Status](https://coveralls.io/repos/github/midnite81/badges/badge.svg?branch=master)](https://coveralls.io/github/midnite81/badges?branch=master)
_A PHP package to render out package badges_

# Installation

This package requires PHP 5.6+  

To install through composer include the package in your `composer.json`.

    "midnite81/badges": "^1.0.0"

Run `composer install` or `composer update` to download the dependencies or you can 
run `composer require midnite81/badges`.

## Badges Supported

| Type             | Example                                                                                                                                                    |
|------------------|------------------------------------------------------------------------------------------------------------------------------------------------------------|
|Latest Stable     |[![Latest Stable Version](https://poser.pugx.org/midnite81/badges/version)](https://packagist.org/packages/midnite81/badges)                                |
|Total Downloads   |[![Total Downloads](https://poser.pugx.org/midnite81/badges/downloads)](https://packagist.org/packages/midnite81/badges)                                    |
|Latest Unstable   |[![Latest Unstable Version](https://poser.pugx.org/midnite81/badges/v/unstable)](https://packagist.org/packages/midnite81/badges)                           |
|Licence           |[![License](https://poser.pugx.org/midnite81/badges/license.svg)](https://packagist.org/packages/midnite81/badges)                                          |
|Build             |[![Build](https://travis-ci.org/midnite81/badges.svg?branch=master)](https://travis-ci.org/midnite81/badges)                                                |
|Coverage          |[![Coverage Status](https://coveralls.io/repos/github/midnite81/badges/badge.svg?branch=master)](https://coveralls.io/github/midnite81/badges?branch=master)|
|StyleCI           |(Coming soon)                                                                                                                                               |

Over time support for other badges will be added. You can create your own templates which extend 
`Midnite81\Badges\Type\BadgeType` and can be passed through the `$badges->get(MyClass::class)` method. More 
documentation on adding your own templates will be added later.

## Example Usage

Firstly, you need to create an instance of badges. 

```php
use Midnite81\Badges\Badges;
$badges = new Badges($attributes);
// or 
$badges = Badges::create($attributes);
```

You'll notice that a variable of $attributes is passed on construction. The attributes are what the package will use
to translate the template. By default we're only going to pass the following attributes as they are needed for the 
supported badges. Obviously update the above attributes to suit your own needs. 

```php
$attributes = [
    '$PACKAGE_NAME$' => 'midnite81/badges', 
    '$STYLE_CI$' => 'repoNumber'
];
```

Once the class is instantiated, you then need to select the type of badge you want. 

```php
$myBadge = $this->latestStableVersion();
```

This will return you a `Writer` object, which you can call `->toHtml()` or `->toMarkdown` on for the final rendering 
of the badge. The default `_toString` method will return the html version.

So all in all; 

```
use Midnite81\Badges\Badges;
$badges = Badges::create(['$PACKAGE_NAME$' => 'midnite81/badges']); 

echo $badges->latestStableVersion()->toMarkdown(); 
```
will output

[![Latest Stable Version](https://poser.pugx.org/midnite81/badges/version)](https://packagist.org/packages/midnite81/badges)    

`[![Latest Stable Version](https://poser.pugx.org/midnite81/badges/version)](https://packagist.org/packages/midnite81/badges)` 