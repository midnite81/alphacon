<?php

namespace Midnite81\Alphacon\Tests;

use Midnite81\Alphacon\Contracts\Dictionaries\IDictionary;

class TestDictionary implements IDictionary
{

    public function getLibrary(): array
    {
        return [];
    }
}