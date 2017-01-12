<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-08
 * Time: 下午 5:15.
 */

namespace xltxlm\helper\Ctroller\Request;

use xltxlm\helper\Hclass\CopyObjectAttributeName;
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
    use CopyObjectAttributeName;

    /**
     * Get constructor.
     */
    public function __construct()
    {
        $_SERVER[static::class] = &$_GET;
        $this->load($_GET);
    }

    /**
     * 把类的变量转换成请求的数据
     */
    public function export()
    {
        foreach (get_object_vars($this) as $key => $object_var) {
            $_SERVER[static::class][$key] = $object_var;
        }
    }
}
