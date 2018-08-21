<?php

namespace xltxlm\helper\test\Basic\Str;

use xltxlm\helper\Basic\Str;

/**
 *
 */
class SplitBystr_28
{

    public function __invoke()
    {
        //获取类的名称
        $name = (new Str())
            ->setValue(__CLASS__)
            ->SplitBystr('\\');
        if ($name != 'SplitBystr_28') {
            throw new \Exception("$name != 'SplitBystr_28'");
        }

        //获取项目的名称
        $name = (new Str())
            ->setValue(__CLASS__)
            ->SplitBystr('\\', 1);

        if ($name != 'helper') {
            throw new \Exception("$name != 'helper'");
        }

        \xltxlm\helper\Util::d($name);
    }

}

