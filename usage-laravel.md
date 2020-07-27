# Alphacon [![Latest Stable Version](https://poser.pugx.org/midnite81/alphacon/version)](https://packagist.org/packages/midnite81/alphacon) [![Total Downloads](https://poser.pugx.org/midnite81/alphacon/downloads)](https://packagist.org/packages/midnite81/alphacon) [![Latest Unstable Version](https://poser.pugx.org/midnite81/alphacon/v/unstable)](https://packagist.org/packages/midnite81/alphacon) [![License](https://poser.pugx.org/midnite81/alphacon/license.svg)](https://packagist.org/packages/midnite81/alphacon) [![Build](https://travis-ci.org/midnite81/alphacon.svg?branch=master)](https://travis-ci.org/midnite81/alphacon) [![Coverage Status](https://coveralls.io/repos/github/midnite81/alphacon/badge.svg?branch=master)](https://coveralls.io/github/midnite81/alphacon?branch=master)

## Laravel Usage

Now you've installed Alphacon into Laravel either by adding it to your `config/app.php` or
by letting it be auto discovered, you are ready to inject the interface and convert 
strings!

### Dependency Injection

This package comes with three default Interfaces you can dependency inject; 

|Interface|Produces|
|---|---|
|ITranslate|Produces the Translate class with no dictionary installed|
|INatoTranslate|Produces the Translate class with the Nato dictionary installed|
|IMorseCodeTranslate|Produces the Translate class with the Morse code dictionary installed|

In order for the translator to work, it requires a Dictionary. A dictionary must implement
a `IDictionary`. For an example of this please look at 
`src/Dictionaries/NatoDictionary.php`

If you inject `ITranslate` into your method, you will need to set the Dictionary manually.

```php
use \Midnite81\Alphacon\Contracts\Services;

public function example(ITranslate $translate)
{
    $translate->setDictionary(new MyCustomDictionary());
}

```

Once a dictionary has been injected or if you have used a pre-defined translator such as 
Nato, you can then do the following;

```php
use \Midnite81\Alphacon\Contracts\Services;

public function example(INatoTranslate $translate)
{
    $result = $translate->of('Test'); // this is the string I want converting

    $result->toTranslatedString(); // TANGO echo sierra tango

    $result->toTranslatedArray(); // [0 => 'TANGO', 1 => 'echo', 2 => 'sierra', 3 => 'tango']

    $result->toArray(); // [0 => [ 'character' => 'T', 'translated' => 'TANGO' ] 1 => ... ]
}
```

### Factories

If you don't fancy dependency injecting the translator, a factory class has also been 
created.

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

### Creating your own Dictionary

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

Then you can either pass it to ITranslate using the setDictionary method or alternatively
you could extend the AlphaconService provider and bind as follows;

```php
use Midnite81\Alphacon\AlphaconServiceProvider;
use Midnite81\Alphacon\Contracts\Services\ITranslator;
use Midnite81\Alphacon\Services\Translator;

class ExtendedServiceProvider extends AlphaconServiceProvider
{ 
    public function register(){
        parent::register();
    
        $this->app->bind(IMyCustomTranslate::class, function($app) { 
            new Translator(new MyCustomDictionary());
        });
    }
}
```

You will need to create the interface (IMyCustomTranslate), but you do not need to do 
anything else with it. Simply inherit from ITranslate and you'll have all the methods
you require.

```php
interface IMyCustomTranslate extends \Midnite81\Alphacon\Contracts\Services\ITranslator
{
}
```