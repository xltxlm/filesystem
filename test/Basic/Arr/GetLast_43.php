<?php
namespace xltxlm\helper\test\Basic\Arr;

use xltxlm\helper\Basic\Arr;

/**
*
*/
class GetLast_43{

    public function __invoke()
    {
        $var=(new Arr())
        ->setDefaultArray(['ax','b'])
        ->GetLast();
        if($var!='b')
        {
            throw new \Exception('取第一个值错误');
        }
    }

}

