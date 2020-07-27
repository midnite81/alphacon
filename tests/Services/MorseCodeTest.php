<?php

namespace Midnite81\Alphacon\Tests\Services;

use Midnite81\Alphacon\Dictionaries\MorseCodeDictionary;
use Midnite81\Alphacon\Exceptions\DictionaryMustBeSetException;
use Midnite81\Alphacon\Services\Translator;
use PHPUnit\Framework\TestCase;

class MorseCodeTest extends TestCase
{
    /**
     * @var Translator
     */
    protected Translator $sut;

    protected function setUp(): void
    {
        parent::setUp();
        $this->sut = new Translator(new MorseCodeDictionary());
    }

    /** @test
     * @throws DictionaryMustBeSetException
     */
    public function given_initialised_with_morse_code_expect_string_of_translated_letters()
    {
        $this->sut->of('This is a test');

        $result = $this->sut->toTranslatedString();

        $this->assertEquals('- •••• •• •••   •• •••   •-   - • ••• -', $result);
    }

    /** @test
     * @throws DictionaryMustBeSetException
     */
    public function given_initialised_with_morse_code_expect_array_of_translated_letters()
    {
        $this->sut->of('This is a test');

        $result = $this->sut->toTranslatedArray();

        $this->assertEquals('-', $result[0]);
        $this->assertEquals('••••', $result[1]);
        $this->assertEquals('••', $result[2]);
        $this->assertEquals('•••', $result[3]);
        $this->assertEquals(' ', $result[4]);
        $this->assertEquals('••', $result[5]);
        $this->assertEquals('•••', $result[6]);
        $this->assertEquals(' ', $result[7]);
        $this->assertEquals('•-', $result[8]);
        $this->assertEquals(' ', $result[9]);
        $this->assertEquals('-', $result[10]);
        $this->assertEquals('•', $result[11]);
        $this->assertEquals('•••', $result[12]);
        $this->assertEquals('-', $result[13]);
    }
}