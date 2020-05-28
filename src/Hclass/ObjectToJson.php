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
        //为什么这里不用 get_object_vars ？ 因为可能某个属性也是一个对象，这个就搞不定了！
        return (new ConvertObject($this))->toJson() ?: '';
    }
}
