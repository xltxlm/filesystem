<?php
namespace xltxlm\helper\test\Basic\Arr;

use xltxlm\helper\Basic\Arr;
use xltxlm\helper\Basic\Str;

/**
*
*/
class GetFirst_42{

    public function __invoke()
    {
        $s="xxx.mp3";
        $ext=(new Str())
            ->setValue($s)
            ->Split('.')
            ->GetLast();

        if($ext!='mp3')
        {
            throw new \Exception('1取第一个值错误');
        }


        $var=(new Arr())
            ->setDefaultArray(['ax','b'])
            ->GetFirst();
        if($var!='ax')
        {
            throw new \Exception('2取第一个值错误');
        }
    }

}

