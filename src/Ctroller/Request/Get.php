<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-08
 * Time: 下午 5:15.
 */

namespace xltxlm\helper\Ctroller\Request;

use xltxlm\helper\Hclass\LoadFromArray;
use xltxlm\helper\Hclass\ObjectToJson;

/**
 * get模型的自动加载类
 * Class Get.
 */
trait Get
{
    use LoadFromArray {
        __construct as load;
    }
    use ObjectToJson;

    /**
     * Get constructor.
     */
    public function __construct()
    {
        $this->load($_GET);
    }

    /**
     * 获取变量的名称,用法:要求getxxx() 改为 &getxxxx(),[并且]最后一行是 return $this->xxx; 不能是 return $this->xxx='xx';
     * @param $var
     * @return string
     */
    final public function varName(&$var)
    {
        $tmp = $var;
        $var = 'tmp_exists_'.uniqid();
        $name = array_search($var, get_object_vars($this), true);
        $var = $tmp;

        return $name;
    }
}
