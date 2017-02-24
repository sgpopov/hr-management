<?php

namespace App\Documents;

class Keywords
{
    public static function extract(string $content)
    {
        $out = [];

        preg_match_all('/{(.*?)}/', $content, $out);

        return array_unique($out[0]);;
    }
}
