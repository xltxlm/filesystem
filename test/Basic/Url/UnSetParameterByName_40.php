<?php

namespace xltxlm\helper\test\Basic\Url;

use xltxlm\helper\Basic\Str;
use xltxlm\helper\Basic\Url;

/**
 *
 */
class UnSetParameterByName_40
{

    public function __invoke()
    {
        $newurl = (new Url())
            ->setUrl('https://admin.kuaigeng.com:1448/?c=Admin/SsouserCross&prepage=20&pageID=1&sametime=false')
            ->UnSetParameterByName_this('c')
            ->__invoke();
        $替换失败 = (new Str())
            ->setValue($newurl)
            ->Strpos('SsouserCross');
        \xltxlm\helper\Util::d($newurl);
        if ($替换失败) {
            throw new \Exception('替换参数失败');
        } else {
        }
    }

}

