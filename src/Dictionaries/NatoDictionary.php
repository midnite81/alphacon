<?php

namespace Midnite81\Alphacon\Dictionaries;

use Midnite81\Alphacon\Contracts\Dictionaries\IDictionary;

class NatoDictionary implements IDictionary
{

    public function getLibrary(): array
    {
        return [
            'a' => "Alpha",
            'b' => "Bravo",
            'c' => "Charlie",
            'd' => "Delta",
            'e' => "Echo",
            'f' => "Foxtrot",
            'g' => "Golf",
            'h' => "Hotel",
            'i' => "India",
            'j' => "Juliet",
            'k' => "Kilo",
            'l' => "Lima",
            'm' => "Mike",
            'n' => "November",
            'o' => "Oscar",
            'p' => "Papa",
            'q' => "Quebec",
            'r' => "Romeo",
            's' => "Sierra",
            't' => "Tango",
            'u' => "Uniform",
            'v' => "Victor",
            'w' => "Whiskey",
            'x' => "X-Ray",
            'y' => "Yankee",
            'z' => "Zulu",
            '0' => "Zero",
            '1' => "One",
            '2' => "Two",
            '3' => "Three",
            '4' => "Four",
            '5' => "Five",
            '6' => "Six",
            '7' => "Seven",
            '8' => "Eight",
            '9' => "Nine",
            '-' => "Dash",
            '!' => "Exclamation Mark",
            '@' => "At Symbol",
            "£" => "Pound Sign",
            "$" => "Dollar Sign",
            "%" => "Percentage Sign",
            "^" => "Caret",
            "&" => "Ampersand",
            "*" => "Asterisk",
            "(" => "Bracket",
            ")" => "Bracket",
            "{" => "Left curly bracket",
            "}" => "Right curly bracket",
            "[" => "Left square bracket",
            "]" => "Right square bracket",
            "<" => "Less than sign",
            ">" => "Greater than sign",
            "\\" => "Backslash",
            "/" => "Slash",
            ":" => "Colon",
            ";" => "Semi-colon",
            "\"" => "Speech Mark",
            "'" => "Quote Mark",
            "?" => "Question Mark",
            "." => "Full Stop",
            "," => "Comma",
            "`" => "Backtick",
            "~" => "Tilda",
            "±" => "Plus minus sign",
            "§" => "Section sign",
            " " => "[Space]"
        ];
    }
}