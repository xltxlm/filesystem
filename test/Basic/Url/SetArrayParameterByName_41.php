<?php

namespace xltxlm\helper\test\Basic\Url;

use xltxlm\helper\Basic\Str;
use xltxlm\helper\Basic\Url;

/**
 *
 */
class SetArrayParameterByName_41
{

    public function __invoke()
    {
        $newurl = (new Url())
            ->setUrl('https://admin.kuaigeng.com:1448/?c=Admin/SsouserCross&prepage=20&pageID=1&sametime=false')
            ->SetArrayParameterByName_this('a', 'b')
            ->SetArrayParameterByName_this('a', 'c')
            ->__invoke();
        $newurlObject = (new Url())
            ->setUrl($newurl);
        $newurlObject->__invoke();

        $替换成功 = $newurlObject->getParameter()['a'] == ['b', 'c'];
        if ($替换成功) {
        } else {
            throw new \Exception('替换参数失败');
        }
    }

}

