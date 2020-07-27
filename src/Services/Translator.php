<?php

namespace Midnite81\Alphacon\Services;

use Midnite81\Alphacon\Contracts\Dictionaries\IDictionary;
use Midnite81\Alphacon\Contracts\Services\ITranslator;
use Midnite81\Alphacon\Exceptions\DictionaryMustBeSetException;
use Midnite81\Alphacon\Exceptions\SetDictionaryBeforeHittingOfMethodException;

class Translator implements ITranslator
{
    protected string $subject = "";

    protected array $subjectArray = [];

    protected bool $initialised = false;

    protected ?IDictionary $dictionary;

    /**
     * Translate constructor.
     *
     * @param IDictionary|null $library
     *
     */
    public function __construct(?IDictionary $library = null)
    {
        $this->dictionary = $library;
    }

    /**
     * Create an instance of Translate
     *
     * @param IDictionary $library
     * @param string      $subject
     *
     * @return ITranslator
     */
    public static function instance(IDictionary $library, string $subject): ITranslator
    {
        $translate = new static($library);

        return $translate->of($subject);
    }

    /**
     * @param IDictionary $dictionary
     *
     * @return ITranslator
     * @throws SetDictionaryBeforeHittingOfMethodException
     */
    public function setDictionary(IDictionary $dictionary): ITranslator {
        if ($this->initialised) {
            throw new SetDictionaryBeforeHittingOfMethodException(
                'You must invoke the \'setDictionary\' method before invoking the \'of\' method.'
            );
        }

        $this->dictionary = $dictionary;
        return $this;
    }

    /**
     * Set the subject to be converted
     *
     * @param string $subject
     *
     * @return ITranslator
     * @throws DictionaryMustBeSetException
     */
    public function of(string $subject): ITranslator
    {
        if (!$this->getDictionary() instanceof IDictionary) {
            throw new DictionaryMustBeSetException('A dictionary must be set before calling of method');
        }

        $this->initialised = true;

        $this->subject = $subject;
        $this->generateTranslatedArray();

        return $this;
    }

    /**
     * Return the complete translatedArray including source and translated content
     *
     * @return array
     */
    public function toArray(): array {
        return $this->subjectArray;
    }

    /**
     * Returns the translated subject as a string
     *
     * @param string $spacer
     *
     * @return string
     */
    public function toTranslatedString(string $spacer = " "): string {
        $translatedCharacters = array_map(function($item) {
            return $item['translated'];
        }, $this->subjectArray);

        return implode($spacer, $translatedCharacters);
    }

    /**
     * Returns the translated subject as an array
     *
     * @return array
     */
    public function toTranslatedArray(): array {
        return array_map(function($item) {
            return $item['translated'];
        }, $this->subjectArray);
    }

    /**
     * @return IDictionary|null
     */
    public function getDictionary(): ?IDictionary
    {
        return $this->dictionary;
    }

    /**
     * @return string
     */
    public function getSubject(): string
    {
        return $this->subject;
    }

    /**
     * Generate Translated Array
     */
    protected function generateTranslatedArray(): void
    {
        $dictionary = $this->dictionary->getLibrary();

        for ($i = 0; $i < strlen($this->subject); $i++) {
            $originalLetter = substr($this->subject, $i, 1);
            $lowercaseLetter = strtolower($originalLetter);
            $translatedLetter = (!empty($dictionary[$lowercaseLetter]))
                ? ['translated' => $this->correctCase($originalLetter), 'character' => $originalLetter]
                : ['translated' => $originalLetter, 'character' => $originalLetter];

            $this->subjectArray[] = $translatedLetter;
        }
    }

    /**
     * @param string $originalLetter
     *
     * @return string
     */
    protected function correctCase(string $originalLetter): string
    {
        $natoArray = $this->dictionary->getLibrary();

        if (ctype_upper($originalLetter)) {
            return strtoupper($natoArray[strtolower($originalLetter)]);
        }

        if (ctype_lower($originalLetter)) {
            return strtolower($natoArray[strtolower($originalLetter)]);
        }

        return $natoArray[strtolower($originalLetter)];
    }
}