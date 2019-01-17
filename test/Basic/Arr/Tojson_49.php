<?php

namespace xltxlm\helper\test\Basic\Arr;
use xltxlm\helper\Basic\Arr;

/**
 *
 */
class Tojson_49
{

    public function __invoke()
    {
        $arr = explode('/', '//ccc///dd');
        \xltxlm\helper\Util::d($arr);
        $obj = (new Arr())
            ->setDefaultArray($arr);
        \xltxlm\helper\Util::d([$obj->getDefaultArray(), ['ccc', 'dd']]);
        \xltxlm\helper\Util::d([json_encode($obj->getDefaultArray()), json_encode(['ccc', 'dd'])]);
        $删除了空元素 = json_encode($obj->getDefaultArray()) == json_encode(['ccc', 'dd']);
        if ($删除了空元素 == false) {
            throw new \Exception('没有删除');
        }
    }

}

