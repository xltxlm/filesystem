<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-11
 * Time: 下午 7:48
 */

namespace xltxlm\helper\Hclass;

/**
 * 把类格式化成 k=v的字符串格式,空格隔开
 * Class ObjectToKeyVar
 * @package xltxlm\helper\Hclass
 */
trait ObjectToKeyVar
{

    final public function __toString()
    {
        $vars = get_object_vars($this);
        $new_array = [];
        foreach ($vars as $k => $v) {
            $new_array[] = "$k=" . json_encode($v, JSON_UNESCAPED_UNICODE);
        }
        return join(" ", $new_array);
    }
}