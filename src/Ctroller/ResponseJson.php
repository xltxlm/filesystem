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
trait ResponseJson
{
    /** @var string jsonp的输出函数名,约定就是这个名字 */
    protected $jsfunction = "";

    final public function __toString()
    {
        $returnData = json_encode(get_object_vars($this), JSON_UNESCAPED_UNICODE);
        //
        if ($this->jsfunction) {
            $dataNew = "{$this->jsfunction}(".$returnData.")";
        } else {
            $dataNew = $returnData;
        }
        if (!$this->jsfunction && !headers_sent()) {
            header("Access-Control-Allow-Origin:*");
            header("Content-type:application/json");
            header('Content-Length: '.strlen($dataNew));
        }
        echo $dataNew;
        die;
    }
}