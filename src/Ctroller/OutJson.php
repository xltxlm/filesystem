<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-07
 * Time: 下午 10:37
 */

namespace xltxlm\helper\Ctroller;

/**
 * 输出json格式的数据
 * Class OutJson
 * @package xltxlm\helper\Ctroller
 */
trait OutJson
{
    /**
     * @param mixed $data_new 输出内容
     * @param bool $jsfunction 是否是jaonp
     */
    private function jsonShow($data_new, $jsfunction = false)
    {
        //
        if ($jsfunction) {
            $data_new = "{$jsfunction}(".$data_new.")";
        }
        if (!headers_sent()) {
            header("Access-Control-Allow-Origin:*");
            header("Content-type:application/json");
            header('Content-Length: '.strlen($data_new));
        }
        echo json_encode($data_new, JSON_UNESCAPED_UNICODE);
        die;
    }
}