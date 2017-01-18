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
    /**
     * 把一级索引下面的对象转换成数组
     * @return string
     */
    final public function __toString()
    {
        $get_object_vars = get_object_vars($this);
        foreach ($get_object_vars as $key => $get_object_var) {
            if (is_object($get_object_var)) {
                $get_object_vars[$key] = (new ConvertObject($get_object_var))->toArray();
            }
        }
        return json_encode($get_object_vars, JSON_UNESCAPED_UNICODE);
    }
}
