<?php

namespace Midnite81\Alphacon;

use Midnite81\Alphacon\Contracts\Dictionaries\IDictionary;
use Midnite81\Alphacon\Contracts\Services\ITranslator;
use Midnite81\Alphacon\Dictionaries\MorseCodeDictionary;
use Midnite81\Alphacon\Dictionaries\NatoDictionary;
use Midnite81\Alphacon\Services\Translator;


class Factory
{
    /**
     * @param string $string
     *
     * @return ITranslator
     * @throws Exceptions\DictionaryMustBeSetException
     */
    public static function nato(string $string = ""): ITranslator
    {
        return static::setTranslator(new NatoDictionary(), $string);
    }

    /**
     * @param string $string
     *
     * @return ITranslator
     * @throws Exceptions\DictionaryMustBeSetException
     */
    public static function morseCode(string $string = ""): ITranslator
    {
        return static::setTranslator(new MorseCodeDictionary(), $string);
    }

    /**
     * @param IDictionary $translator
     * @param string      $string
     *
     * @return ITranslator
     * @throws Exceptions\DictionaryMustBeSetException
     */
    public static function make(IDictionary $translator, string $string = ""): ITranslator
    {
        return static::setTranslator($translator, $string);
    }

    /**
     * @param string $translator
     * @param string $string
     *
     * @return ITranslator
     * @throws Exceptions\DictionaryMustBeSetException
     */
    public static function makeByString(string $translator, string $string = ""): ITranslator
    {
        return static::setTranslator(new $translator, $string);
    }

    /**
     * @param IDictionary $dictionary
     * @param string      $string
     *
     * @return ITranslator
     * @throws Exceptions\DictionaryMustBeSetException
     */
    private static function setTranslator(IDictionary $dictionary, string $string = ""): ITranslator
    {
        $translate = new Translator($dictionary);

        if (!empty($string)) {
            $translate->of($string);
        }

        return $translate;
    }
}