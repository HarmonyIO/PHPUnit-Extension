# phpunit-extension

[![Latest Stable Version](https://poser.pugx.org/harmonyio/phpunit-extension/v/stable)](https://packagist.org/packages/harmonyio/phpunit-extension)
[![Build Status](https://travis-ci.org/HarmonyIO/PHPUnit-Extension.svg?branch=master)](https://travis-ci.org/HarmonyIO/PHPUnit-Extension)
[![Build status](https://ci.appveyor.com/api/projects/status/975c97860u29be9f/branch/master?svg=true)](https://ci.appveyor.com/project/PeeHaa/phpunit-extension/branch/master)
[![Coverage Status](https://coveralls.io/repos/github/HarmonyIO/PHPUnit-Extension/badge.svg?branch=master)](https://coveralls.io/github/HarmonyIO/PHPUnit-Extension?branch=master)
[![License](https://poser.pugx.org/harmonyio/phpunit-extension/license)](https://packagist.org/packages/harmonyio/phpunit-extension)

Async PHPUnit helpers

## Requirements

- PHP 7.3

In addition for non-blocking context one of the following event libraries should be installed:

- [ev](https://pecl.php.net/package/ev)
- [event](https://pecl.php.net/package/event)
- [php-uv](https://github.com/bwoebi/php-uv)

## Installation

```
composer require harmonyio/phpunit-extension
```

## Usage

PHPUnit's assertions can be used transparently on promises. The promises will automatically be resolved to their values and the eventual values will be asserted against.

```php
<?php declare(strict_types=1);

namespace Foo\Test\Unit;

use Amp\Success;
use HarmonyIO\PHPUnitExtension\TestCase;

class BarTest extends TestCase
{
    public function testPromiseValueAssertsCorrectly(): void
    {
        // the promise will be automatically resolved here
        // and the eventual value will be asserted instead of the promise itself
        $this->assertTrue(new Success(true));
    }
}
```
