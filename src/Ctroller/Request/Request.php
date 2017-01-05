<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-09
 * Time: 上午 10:53.
 */

namespace xltxlm\helper\Ctroller\Request;

trait Request
{
    use Get;

    public function __construct()
    {
        $_SERVER[static::class] = &$_REQUEST;
        $this->load($_POST + $_GET);
    }

    /**
     * 自身实例化
     * @return static
     */
    final private static function selfInstance()
    {
        static $class;
        if (empty($class)) {
            $class = new static();
        }

        return $class;
    }

    /**
     * 把类的变量转换成请求的数据
     */
    public function export()
    {
        foreach (get_object_vars($this) as $key => $object_var) {
            $_POST[$key] = $object_var;
            $_GET[$key] = $object_var;
            $_REQUEST[$key] = $object_var;
        }
    }
}
