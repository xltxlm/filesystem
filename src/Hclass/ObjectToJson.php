<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-06
 * Time: 下午 11:05.
 */

namespace xltxlm\helper\Hclass;

/**
 * 把对象输出成json格式
 * Class ObjectToJson.
 */
trait ObjectToJson
{
    final public function __toString()
    {
        return json_encode(get_object_vars($this), JSON_UNESCAPED_UNICODE);
    }
}
