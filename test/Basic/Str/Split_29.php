<?php

namespace xltxlm\helper\test\Basic\Str;
use xltxlm\helper\Basic\Str;

/**
 *
 */
class Split_29
{

    public function __invoke()
    {
        $str = 'a,b,c';
        $newarr = (new Str())
            ->setValue($str)
            ->Split(',');
        \xltxlm\helper\Util::d($newarr);
    }

}

