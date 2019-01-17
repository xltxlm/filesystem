<?php

namespace xltxlm\helper\Basic;

use xltxlm\helper\Hclass\LoadFromArray;

/**
 * 字符串数组相关处理;
 */
class Arr extends Arr_implements
{
    public function setDefaultArray($DefaultArray)
    {
        //去掉空数组
        $DefaultArray = array_values(array_diff($DefaultArray, ['']));
        return parent::setDefaultArray($DefaultArray);
    }

    public function Diff(array $StrigArray = null): array
    {
        // TODO: Implement Diff() method.
    }

    public function Push(string $NewString = null): array
    {
        // TODO: Implement Push() method.
    }

}