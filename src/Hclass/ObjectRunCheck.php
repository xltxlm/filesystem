<?php

namespace xltxlm\helper\Hclass;


/**
 * 给任何类添加代码运行时检查，时刻提醒自己：是不是必须崩溃？还是可以进行透传;
 */
Trait ObjectRunCheck
{
    use ObjectRunCheck\ObjectRunCheck_implements;

    protected function object_set_maybe()
    {
        // TODO: Implement object_set_maybe() method.
    }

    protected function var_set_maybe()
    {
        try {
            $var = $fun();
        } catch (Throwable $e) {
            return $default;
        }
        return $var ?: $default;
    }


}