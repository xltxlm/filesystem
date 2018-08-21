<?php

namespace xltxlm\helper\test\Basic\Str;
use xltxlm\helper\Basic\Str;

/**
 *
 */
class AtIndex_18
{

    public function __invoke()
    {
        $s = 'abc';
        $new = (new Str())
            ->setValue($s)
            ->AtIndex(2);
        var_dump($new);
        if ($new != 'c') {
            throw new \Exception("$new !=c");
        }
        $校对 = (new Str())
                ->setValue($s)
                ->AtIndex_this(2)
                ->getValue() === $new;
        var_dump($校对);
        if (!$校对) {
            throw new \Exception('error');
        }
    }

}

