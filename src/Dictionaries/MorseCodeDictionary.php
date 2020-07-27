<?php

namespace Midnite81\Alphacon\Dictionaries;

use Midnite81\Alphacon\Contracts\Dictionaries\IDictionary;

class MorseCodeDictionary implements IDictionary
{

    public function getLibrary(): array
    {
        return [
            "a" => "•-",
            "b" => "-•••",
            "c" => "-•-•",
            "d" => "-••",
            "e" => "•",
            "f" => "••-•",
            "g" => "--•",
            "h" => "••••",
            "i" => "••",
            "j" => "•---",
            "k" => "-•-",
            "l" => "•-••",
            "m" => "--",
            "n" => "-•",
            "o" => "---",
            "p" => "•--•",
            "q" => "--•-",
            "r" => "•-•",
            "s" => "•••",
            "t" => "-",
            "u" => "••-",
            "v" => "•••-",
            "w" => "•--",
            "x" => "-••-",
            "y" => "-•--",
            "z" => "--••",
            "0" => "-----",
            "1" => "•----",
            "2" => "••---",
            "3" => "•••--",
            "4" => "••••-",
            "5" => "•••••",
            "6" => "-••••",
            "7" => "--•••",
            "8" => "---••",
            "9" => "----•",
            "." => "•-•-•-",
            "," => "--••--",
            "?" => "••--••",
            "/" => "-••-•",
            " " => " "
        ];
    }
}