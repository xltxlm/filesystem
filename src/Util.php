<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-17
 * Time: 下午 3:54.
 */

namespace xltxlm\helper;

/**
 * 快速调试工具
 * Class Util.
 */
class Util
{
    /**
     * 输出内容到php错误日志文件上
     * @param mixed $var
     */
    public static function d($var, $trace = false)
    {
        static $uniqid;
        if (!$uniqid) {
            $uniqid = uniqid();
        }
        $debug_backtrace_old = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS);
        $debug_backtrace = $debug_backtrace_old[0];
        error_log('=>[begin]' . microtime(true));
        error_log(var_export($var, true));
        if ($trace)
            error_log((new \Exception())->getTraceAsString());
        error_log("<===[$uniqid]=={$debug_backtrace['file']}:{$debug_backtrace['line']}===[end]");
        $_SERVER['REQUEST_URI'] = preg_replace('/([_0-9a-z]+)=&/iUs', '', $_SERVER['REQUEST_URI']);
        error_log("<==={$_SERVER['REQUEST_URI']}===[end]");
    }

    public static function error_log($var)
    {
        static $uniqid;
        if (!$uniqid) {
            $uniqid = uniqid();
        }
        $debug_backtrace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS)[0];
        error_log(date('c') . var_export($var, true) . "\n", 3, $debug_backtrace['file'] . '.lock');
    }

    /**
     * 在代码上记录是否执行到这一行.输出内容到php错误日志文件上
     */
    public static function mark()
    {
        $debug_backtrace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS)[0];
        error_log(sprintf('Call me @%d on %s', $debug_backtrace['line'], $debug_backtrace['file']));
    }
}
