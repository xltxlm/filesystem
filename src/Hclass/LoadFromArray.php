<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-06
 * Time: 下午 9:25.
 */

namespace xltxlm\helper\Hclass;

/**
 * 从数组中加载数据,要求 key 和 setkey成对 要求这种[数据模型]的类不具备行为功能
 * Class LoadFromArray.
 */
trait LoadFromArray
{
    /**
     * 根据数组的key  分配给对应的类属性.
     *
     * @param array $originalData
     */
    final public function __construct(array $originalData = [])
    {
        //把变量的 key去掉 _ 拼接回来变成 setxxx, 如果此方法存在,那么久可以赋值
        foreach ($originalData as $key => $originalDatum) {
            if ($originalDatum === null) {
                continue;
            }
            //变量名一致的
            $methodName = 'set' . ucfirst($key);
            $setFunction = null;
            if (method_exists($this, $methodName)) {
                $setFunction = true;
            } else {
                //变量名中间加载了_  需要特殊处理的
                if (strpos($key, '_') !== false && strpos($key, '_') !== 0) {
                    $keys = explode('_', $key);
                    $keys = array_map('ucfirst', $keys);
                    $methodName = 'set' . implode($keys);
                    if (method_exists($this, $methodName)) {
                        $setFunction = true;
                    }
                }
            }
            //调取当前对象的set功能,set还可以做二次处理
            if ($setFunction) {
                //必须验证不是静态方法
                $ReflectionMethod = (new  \ReflectionMethod($this, $methodName));
                $isStatic = $ReflectionMethod->isStatic();
                if (!$isStatic) {
                    //很无耻地强制修改了一些关键词
                    if ('usercookiename' === $originalDatum) {
                        call_user_func([$this, $methodName], $_COOKIE['username']);
                    } elseif (is_string($originalDatum)) {
                        if (strpos($methodName, 'operation') !== false) {
                            call_user_func([$this, $methodName], rawurldecode($originalDatum));
                        } else {
                            call_user_func([$this, $methodName], rawurldecode(trim($originalDatum)));
                        }
                    } else {
                        call_user_func([$this, $methodName], $originalDatum);
                    }
                }
            }
        }
    }
}
