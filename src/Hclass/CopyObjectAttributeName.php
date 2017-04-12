<?php
/**
 * Created by PhpStorm.
 * User: xialintai
 * Date: 2016/12/24
 * Time: 22:58
 */

namespace xltxlm\helper\Hclass;

/**
 * 如果一个函数返回一个属性,函数前面加上&,即可 用varname(函数名) 取到属性的名称
 * Class CopyObjectAttributeName
 * @package xltxlm\helper\Hclass
 */
trait CopyObjectAttributeName
{
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

    /**
     * 自身实例化
     * @return static
     */
    final protected static function selfInstance()
    {
        static $class;
        if (empty($class)) {
            $class = new static();
        }

        return $class;
    }
}