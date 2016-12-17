<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-17
 * Time: 下午 3:54
 */

namespace xltxlm\helper;

/**
 * 快速调试工具
 * Class Util
 * @package xltxlm\helper
 */
class Util
{
    /**
     * @param mixed $var
     */
    public static function d($var)
    {
        $debug_backtrace=debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS)[0];
        error_log("==={$debug_backtrace['file']}===>\n");
        error_log(var_export($var, true) . "\n");
        error_log("<==={$debug_backtrace['line']}===\n");
    }
}