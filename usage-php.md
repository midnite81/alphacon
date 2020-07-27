# Alphacon [![Latest Stable Version](https://poser.pugx.org/midnite81/alphacon/version)](https://packagist.org/packages/midnite81/alphacon) [![Total Downloads](https://poser.pugx.org/midnite81/alphacon/downloads)](https://packagist.org/packages/midnite81/alphacon) [![Latest Unstable Version](https://poser.pugx.org/midnite81/alphacon/v/unstable)](https://packagist.org/packages/midnite81/alphacon) [![License](https://poser.pugx.org/midnite81/alphacon/license.svg)](https://packagist.org/packages/midnite81/alphacon) [![Build](https://travis-ci.org/midnite81/alphacon.svg?branch=master)](https://travis-ci.org/midnite81/alphacon) [![Coverage Status](https://coveralls.io/repos/github/midnite81/alphacon/badge.svg?branch=master)](https://coveralls.io/github/midnite81/alphacon?branch=master)

## PHP Usage

There are three ways you can utilise Alphacon. You can either instantiate the translator 
class and pass in a dictionary, you can call the static instance method on the translator
class or use the Factory to make the translator class for you.

### Instantiate example

```php
$translator = new \Midnite81\Alphacon\Services\Translator(new MyDictionary());

$translator->of('My String')->toTranslatedString();
```

### Static Instance Method

```php
$translator = new \Midnite81\Alphacon\Services\Translator::instance(new MyDictionary());

$translator->of('My String')->toTranslatedString();
```

### Factory Method

```php
$nato = Midnite81\Alphacon\Factory::nato();
$morseCode = Midnite81\Alphacon\Factory::morseCode();
$custom1 = Midnite81\Alphacon\Factory::make(new MyCustomDictionary());
$custom2 = Midnite81\Alphacon\Factory::makeByString(MyCustomDictionary::class);

// with any of the above you will then need to ->of($subject) to pass through the string
// you want translating.
// Alternatively you can pass the subject as the last argument

$nato = Midnite81\Alphacon\Factory::nato("my string");
$morseCode = Midnite81\Alphacon\Factory::morseCode("my string");
$custom1 = Midnite81\Alphacon\Factory::make(new MyCustomDictionary(), "my string");
$custom2 = Midnite81\Alphacon\Factory::makeByString(MyCustomDictionary::class, "my string");
```

## Custom Dictionaries

To create a custom Dictionary you'll need to implement IDictionary. 

```php
class MyCustomDictionary implements \Midnite81\Alphacon\Contracts\Dictionaries\IDictionary
{
    public function getLibrary(): array
    {
        return [
            'a' => "Apple",
            'b' => "Banana",
            ...
        ];
}
```

Then pass this dictionary to the Translator.