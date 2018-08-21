<?php

namespace xltxlm\helper\test\Basic\Str;

use xltxlm\helper\Basic\Str;

/**
 *
 */
class ToLowerCase_20
{

    public function __invoke()
    {
        $news = (new Str("aBBc"))->ToLowerCase();
        if ($news != 'abbc') {
            throw new \Exception("error");
        }
    }

}

