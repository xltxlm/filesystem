<?php

namespace xltxlm\helper\test\Basic\Url;

use xltxlm\helper\Basic\Str;
use xltxlm\helper\Basic\Url;

/**
 *
 */
class SetParameterByName_39
{

    public function __invoke()
    {
        $newurl = (new Url())
            ->setUrl('https://admin.kuaigeng.com:1448/?c=Admin/SsouserCross&prepage=20&pageID=1&sametime=false')
            ->SetParameterByName_this('c', 'aaaa')
            ->__invoke();
        $替换成功 = (new Str())
            ->setValue($newurl)
            ->Strpos('c=aaaa');
        \xltxlm\helper\Util::d($newurl);
        if ($替换成功) {

        } else {
            throw new \Exception('替换参数失败');
        }
    }

}

