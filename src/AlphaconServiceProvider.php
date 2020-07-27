<?php

namespace Midnite81\Alphacon;

use Illuminate\Support\ServiceProvider;
use Midnite81\Alphacon\Contracts\Services\IMorseCodeTranslator;
use Midnite81\Alphacon\Contracts\Services\INatoTranslator;
use Midnite81\Alphacon\Contracts\Services\ITranslator;
use Midnite81\Alphacon\Dictionaries\MorseCodeDictionary;
use Midnite81\Alphacon\Dictionaries\NatoDictionary;
use Midnite81\Alphacon\Services\Translator;

class AlphaconServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(ITranslator::class, function($app) {
           return new Translator();
        });

        $this->app->bind(INatoTranslator::class, function($app) {
            return new Translator(new NatoDictionary());
        });

        $this->app->bind(IMorseCodeTranslator::class, function($app) {
            return new Translator(new MorseCodeDictionary());
        });
    }
}