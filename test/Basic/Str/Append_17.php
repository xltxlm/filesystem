<?php
namespace xltxlm\helper\test\Basic\Str;

use xltxlm\helper\Basic\Str;

/**
*
*/
class Append_17{

    public function __invoke()
    {
        $s = "abc";
        $append = 'd';
        $new = (new Str())
            ->setValue($s)
            ->append($append);
        var_dump($new);
        if ($new != $s . $append) {
            throw new \Exception("错误 $new vs " . ($s . $append));
        }

        $校对成功 = (new Str())
                ->setValue($s)
                ->Append_this($append)
                ->getValue() === $new;
        var_dump($校对成功);
        if (!$校对成功) {
            throw new \Exception('error');
        }
    }

}

