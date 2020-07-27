<?php

namespace Midnite81\Alphacon;

use Midnite81\Alphacon\Contracts\Services\ITranslator;
use Midnite81\Alphacon\Dictionaries\MorseCodeDictionary;
use Midnite81\Alphacon\Dictionaries\NatoDictionary;
use Midnite81\Alphacon\Tests\TestDictionary;
use PHPUnit\Framework\TestCase;

class FactoryTest extends TestCase
{
    /**
     * @test
     */
    public function it_creates_a_nato_implementation_of_translate()
    {
        $result = Factory::nato();

        $this->assertInstanceOf(ITranslator::class, $result);
        $this->assertInstanceOf(NatoDictionary::class, $result->getDictionary());
    }

    /**
     * @test
     */
    public function it_creates_a_morse_code_implementation_of_translate()
    {
        $result = Factory::morseCode();

        $this->assertInstanceOf(ITranslator::class, $result);
        $this->assertInstanceOf(MorseCodeDictionary::class, $result->getDictionary());
    }

    /**
     * @test
     */
    public function it_creates_a_custom_implementation_of_translate()
    {
        $result = Factory::make(new TestDictionary());

        $this->assertInstanceOf(ITranslator::class, $result);
        $this->assertInstanceOf(TestDictionary::class, $result->getDictionary());
    }

    /**
     * @test
     */
    public function it_creates_a_custom_implementation_of_translate_by_string()
    {
        $result = Factory::makeByString(TestDictionary::class);

        $this->assertInstanceOf(ITranslator::class, $result);
        $this->assertInstanceOf(TestDictionary::class, $result->getDictionary());
    }

    /**
     * @test
     */
    public function it_sets_the_subject()
    {
        $result = Factory::make(new TestDictionary(),'test message');

        $this->assertEquals('test message', $result->getSubject());
    }
}