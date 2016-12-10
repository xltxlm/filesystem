<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-06
 * Time: 下午 9:25
 */

namespace xltxlm\helper\Hclass;

/**
 * 从数组中加载数据,要求 key 和 setkey成对 要求这种[数据模型]的类不具备行为功能
 * Class LoadFromArray
 * @package xltxlm\helper\Hclass
 */
trait LoadFromArray
{
    /**
     * 根据数组的key  打散分配给对应的类属性
     * @param array $originalData
     */
    final public function __construct(array $originalData)
    {
        foreach ($originalData as $key => $originalDatum) {
            //变量名一致的
            $methodName = 'set'.ucfirst($key);
            $setFunction = null;
            if (method_exists($this, $methodName)) {
                $setFunction = true;
            } else {
                //变量名中间加载了_  需要特殊处理的
                if (strpos($key, '_') !== false) {
                    $keys = explode('_', $key);
                    $keys = array_map('ucfirst', $keys);
                    $methodName = 'set'.join($keys);
                    if (method_exists($this, $methodName)) {
                        $setFunction = true;
                    }
                }
            }
            //调取当前对象的set功能,set还可以做二次处理
            if ($setFunction) {
                call_user_func([$this, $methodName], $originalDatum);
            }
        }
    }
}