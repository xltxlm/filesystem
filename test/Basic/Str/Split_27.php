<?php

namespace xltxlm\helper\test\Basic\Str;
use xltxlm\helper\Basic\Str;

/**
 *
 */
class Split_27
{

    public function __invoke()
    {
        $classname=  (new Str())
            ->setValue(__CLASS__)
            ->SplitBystr('\\');
        echo '[' . date('Y-m-d H:i:s') . ']' ."<pre>-->";print_r($classname);echo "<--@in ".__FILE__." on line ".__LINE__."\n";
    }

}

