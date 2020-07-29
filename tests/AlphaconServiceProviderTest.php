<?php

namespace Midnite81\Alphacon\Tests;

use Illuminate\Foundation\Application;
use Midnite81\Alphacon\Contracts\Services\IMorseCodeTranslator;
use Midnite81\Alphacon\Contracts\Services\INatoTranslator;
use Midnite81\Alphacon\Contracts\Services\ITranslator;
use Midnite81\Alphacon\Dictionaries\MorseCodeDictionary;
use Midnite81\Alphacon\Dictionaries\NatoDictionary;
use Midnite81\Alphacon\AlphaconServiceProvider;
use Midnite81\Alphacon\Services\Subs\MorseCodeTranslator;
use Midnite81\Alphacon\Services\Subs\NatoTranslator;
use Midnite81\Alphacon\Services\Translator;
use Orchestra\Testbench\TestCase;

class AlphaconServiceProviderTest extends TestCase
{
    /**
     * @param Application $app
     *
     * @return array|string[]
     */
    protected function getPackageProviders($app)
    {
        return [
            AlphaconServiceProvider::class
        ];
    }

    /** @test */
    public function it_binds_correctly()
    {
        $translate = $this->app->make(ITranslator::class);
        $nato = $this->app->make(INatoTranslator::class);
        $morse = $this->app->make(IMorseCodeTranslator::class);

        $this->assertInstanceOf(Translator::class, $translate);
        $this->assertInstanceOf(NatoTranslator::class, $nato);
        $this->assertInstanceOf(Translator::class, $nato);
        $this->assertInstanceOf(MorseCodeTranslator::class, $morse);
        $this->assertInstanceOf(Translator::class, $morse);

        $this->assertNull($translate->getDictionary());
        $this->assertInstanceOf(NatoDictionary::class, $nato->getDictionary());
        $this->assertInstanceOf(MorseCodeDictionary::class, $morse->getDictionary());
    }
}