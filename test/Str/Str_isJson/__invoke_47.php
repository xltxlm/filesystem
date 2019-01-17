<?php

namespace xltxlm\helper\test\Str\Str_isJson;

use xltxlm\helper\Str\Str_isJson;

/**
 *
 */
class __invoke_47
{

    public function __invoke()
    {
        $is = (new Str_isJson())
            ->setvalue('xxxx')
            ->__invoke();
        \xltxlm\helper\Util::d($is);
        if ($is == true) {
            throw new \Exception(__LINE__);
        }

        $is = (new Str_isJson())
            ->setvalue('["a","测试"]')
            ->__invoke();
        \xltxlm\helper\Util::d($is);
        if ($is != true) {
            throw new \Exception(__LINE__);
        }
    }

}

