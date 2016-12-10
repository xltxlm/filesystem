<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-08
 * Time: 下午 5:15
 */

namespace xltxlm\helper\Ctroller\Request;

use xltxlm\helper\Hclass\LoadFromArray;
use xltxlm\helper\Hclass\ObjectToJson;

/**
 * get模型的自动加载类
 * Class Get
 * @package Ctroller\Request
 */
trait Get
{
    use LoadFromArray {
        __construct as load;
    }
    use ObjectToJson;

    abstract public function load(array $array);
    /**
     * Get constructor.
     */
    public function __construct()
    {
        $this->load($_GET);
    }
}
