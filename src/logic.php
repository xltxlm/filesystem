<?php
/**
 * 这里是逻辑的处理函数，同时记录日志。
 * 主要是为了实现类似go一样的骚操作，不能忽略掉 exception。 （go，是把异常当做第二个返回值，时刻能看到这个鬼东西）
 */

/**
 * 每一个判断都必须通过.
 *
 * @param array  $condition 一组判断逻辑。 原因=>逻辑值
 * @param string $message   总体的说明
 */
function _and(array $condition = [], string $message = ""): bool
{
    foreach ($condition as $msg => $item) {
        if ($item != true) {
            return false;
        }
    }
    return true;
}

/**
 * 如果条件组【有一个】没有满足，那么抛出异常
 *
 * @throws \xltxlm\exception\Exception
 */
function _end_exception(array $condition = [], string $message = "")
{
    foreach ($condition as $msg => $item) {
        if ($item != true) {
            throw new \xltxlm\exception\Exception($message);
        }
    }
    return true;
}

function _or(array $condition = [], string $message = ""): bool
{
    foreach ($condition as $msg => $item) {
        if ($item != true) {
            return false;
        }
    }
    return true;
}
