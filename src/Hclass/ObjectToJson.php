<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-06
 * Time: 下午 11:05.
 */

namespace xltxlm\helper\Hclass;

use xltxlm\helper\BasicType;

/**
 * 把对象输出成json格式
 * Class ObjectToJson.
 */
trait ObjectToJson
{
    /**
     * 把一级索引下面的对象转换成数组
     * @return string
     */
    final public function __toString()
    {
        return (new ConvertObject($this))->toJson() ?: '';
    }
}
