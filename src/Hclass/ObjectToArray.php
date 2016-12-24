<?php
/**
 * Created by PhpStorm.
 * User: xialintai
 * Date: 2016/12/24
 * Time: 18:36
 */

namespace xltxlm\helper\Hclass;

/**
 * 把对象转换成数组
 * Class ObjectToArray
 * @package xltxlm\helper\Hclass
 */
trait ObjectToArray
{
    /**
     * 把对象转换成数组
     * @return array
     */
    final public function __toArray()
    {
        return get_object_vars($this);
    }
}