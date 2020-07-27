<?php

namespace Midnite81\Alphacon\Contracts\Services;

use Midnite81\Alphacon\Contracts\Dictionaries\IDictionary;
use Midnite81\Alphacon\Exceptions\DictionaryMustBeSetException;
use Midnite81\Alphacon\Exceptions\SetDictionaryBeforeHittingOfMethodException;

interface ITranslator
{
    /**
     * @param IDictionary $library
     * @param string      $subject
     *
     * @return ITranslator
     */
    public static function instance(IDictionary $library, string $subject): ITranslator;

    /**
     * Set the subject to be converted
     *
     * @param string $subject
     *
     * @return ITranslator
     * @throws DictionaryMustBeSetException
     */
    public function of(string $subject): ITranslator;

    /**
     * Returns the translated subject as a string
     *
     * @param string $spacer
     *
     * @return string
     */
    public function toTranslatedString(string $spacer = " "): string;

    /**
     * Returns the translated subject as an array
     *
     * @return array
     */
    public function toTranslatedArray(): array;

    /**
     * Return the complete translated Array including source and translated content
     *
     * @return array
     */
    public function toArray(): array;

    /**
     * @param IDictionary $dictionary
     *
     * @return ITranslator
     * @throws SetDictionaryBeforeHittingOfMethodException
     */
    public function setDictionary(IDictionary $dictionary): ITranslator;

    /**
     * @return IDictionary|null
     */
    public function getDictionary(): ?IDictionary;

    /**
     * @return string
     */
    public function getSubject(): string;
}