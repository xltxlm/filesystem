<?php

namespace xltxlm\helper\Ctroller;


/**
 * 根据指定的类（没有指定的话，就是自己），获取所有的函数（这里其实已经排序了），指定某个前缀字符串开始的，循坏调起。
 *
 * 用来分离不同操作的代码。;
 */
Trait MiniRuninvoke
{
    use MiniRuninvoke\MiniRuninvoke_implements;

    public function 分发逻辑器(string $prefix = "run_", string $paser_classname = null)
    {
        if ($paser_classname) {
            $paser_classname_real = $paser_classname;
        } else {
            $paser_classname_real = static::class;
        }
        $reflectionClass = new \ReflectionClass($paser_classname_real);
        foreach ($reflectionClass->getMethods() as $reflectionMethod) {
            if (strpos($reflectionMethod->getName(), $prefix) === 0) {
                call_user_func([$this, $reflectionMethod->getName()]);
            }
        }
    }


}