<?php

namespace xltxlm\helper\test\Basic\Str;

use xltxlm\helper\Basic\Str;

/**
 *
 */
class Substr_19
{

    public function __invoke()
    {
        $news = (new Str("abc"))
            ->Substr(1, 1);
        if ($news != 'b') {
            throw new \Exception($news);
        }

        $news = (new Str("abcd"))
            ->Substr(1, 10);
        if ($news != 'bcd') {
            throw new \Exception($news);
        }


    }

}

