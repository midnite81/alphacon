<?php

namespace Midnite81\Alphacon\Tests\Services;

use Midnite81\Alphacon\Dictionaries\NatoDictionary;
use Midnite81\Alphacon\Exceptions\DictionaryMustBeSetException;
use Midnite81\Alphacon\Exceptions\SetDictionaryBeforeHittingOfMethodException;
use Midnite81\Alphacon\Services\Translator;
use PHPUnit\Framework\TestCase;

class NatoTest extends TestCase
{
    /**
     * @var Translator
     */
    protected Translator $sut;

    protected function setUp(): void
    {
        parent::setUp();
        $this->sut = new Translator(new NatoDictionary());
    }

    /**
     * @test
     * @throws DictionaryMustBeSetException
     */
    public function given_initialised_with_nato_expect_string_of_translated_letters()
    {
        $this->sut->of('This is a test');

        $result = $this->sut->toTranslatedString();

        $this->assertEquals('TANGO hotel india sierra [Space] india sierra [Space] alpha [Space] tango echo sierra tango', $result);
    }

    /**
     * @test
     * @throws DictionaryMustBeSetException
     */
    public function given_initialised_with_nato_expect_array_of_translated_letters()
    {
        $this->sut->of('This is a test');

        $result = $this->sut->toTranslatedArray();

        $this->assertEquals('TANGO', $result[0]);
        $this->assertEquals('hotel', $result[1]);
        $this->assertEquals('india', $result[2]);
        $this->assertEquals('sierra', $result[3]);
        $this->assertEquals('[Space]', $result[4]);
        $this->assertEquals('india', $result[5]);
        $this->assertEquals('sierra', $result[6]);
        $this->assertEquals('[Space]', $result[7]);
        $this->assertEquals('alpha', $result[8]);
        $this->assertEquals('[Space]', $result[9]);
        $this->assertEquals('tango', $result[10]);
        $this->assertEquals('echo', $result[11]);
        $this->assertEquals('sierra', $result[12]);
        $this->assertEquals('tango', $result[13]);
    }

    /**
     * @test
     * @throws DictionaryMustBeSetException
     */
    public function given_initialised_with_nato_expect_complete_array_of_translated_letters()
    {
        $this->sut->of('Hello');

        $result = $this->sut->toArray();

        $this->assertEquals('HOTEL', $result[0]['translated']);
        $this->assertEquals('H', $result[0]['character']);

        $this->assertEquals('echo', $result[1]['translated']);
        $this->assertEquals('e', $result[1]['character']);

        $this->assertEquals('lima', $result[2]['translated']);
        $this->assertEquals('l', $result[2]['character']);

        $this->assertEquals('lima', $result[3]['translated']);
        $this->assertEquals('l', $result[3]['character']);

        $this->assertEquals('oscar', $result[4]['translated']);
        $this->assertEquals('o', $result[4]['character']);
    }

    /** @test
     * @throws SetDictionaryBeforeHittingOfMethodException|DictionaryMustBeSetException
     */
    public function given_subject_set_after_of_invoked_expect_exception()
    {
        $this->expectException(SetDictionaryBeforeHittingOfMethodException::class);

        $this->sut->of('test')->setDictionary(new NatoDictionary());
    }

    /**
     * @test
     * @throws SetDictionaryBeforeHittingOfMethodException
     */
    public function given_set_dictionary_is_set_expect_dictionary_set()
    {
        $sut = $this->sut->setDictionary(new NatoDictionary());

        $this->assertInstanceOf(Translator::class, $sut);
        $this->assertInstanceOf(NatoDictionary::class, $sut->getDictionary());
    }

    /**
     * @test
     */
    public function given_instance_method_invoked_expect_class_returned()
    {
        $sut = Translator::instance(new NatoDictionary(),'test');

        $this->assertInstanceOf(Translator::class, $sut);
        $this->assertInstanceOf(NatoDictionary::class, $sut->getDictionary());
        $this->assertEquals('test', $sut->getSubject());
    }
    
    /** @test */
    public function given_instance_set_without_dictionary_expect_exception()
    {
        $this->expectException(DictionaryMustBeSetException::class);

        $sut = new Translator(null);
        $sut->of('Test');
    }
}