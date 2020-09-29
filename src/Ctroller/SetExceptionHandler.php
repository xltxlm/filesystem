<?php
/**
 * Created by PhpStorm.
 * User: xialintai
 * Date: 2017/4/10
 * Time: 18:57
 */

namespace xltxlm\helper\Ctroller;


use xltxlm\logger\Log\DefineLog;

/**
 * 异常捕捉输出
 * Class set_exception_handler
 *
 * @package xltxlm\helper\Ctroller
 */
class SetExceptionHandler
{
    /** @var  DefineLog 最后一次日志 */
    public static $logOnject;

    /**
     * @param mixed $logOnject
     */
    public static function setLogOnject($logOnject)
    {
        if ($logOnject instanceof DefineLog) {
            self::$logOnject = $logOnject;
        }
    }


    /**
     * set_exception_handler constructor.
     */
    private function __construct()
    {
    }


    public static function instance()
    {
        static $i = 0;
        if ($i === 0) {
            //异常抛出,追加网址来源
            set_exception_handler(function ($exception) {

                //如果出现了异常，记录下日志
                if (self::$logOnject instanceof DefineLog) {
                    self::$logOnject
                        ->__destruct();
                }

                /** @var \Exception $exception */
                $message = [
                    "ERROR" => $exception->getMessage(),
                    "FILE" => $exception->getFile(),
                    "LINE" => $exception->getLine(),
                    'HTTP_REFERER' => $_SERVER['HTTP_REFERER'],
                    'URL' => $_SERVER['REQUEST_URI'],
                    'POST' => $_POST,
                    'IP' => $_SERVER['HTTP_X_REAL_IP']?:$_SERVER['REMOTE_ADDR'],
                ];
                $exceptionS['COOKIE'] = $_COOKIE;
                $exceptionS['GET'] = $_GET;
                $exceptionS['POST'] = $_POST;
                $exceptionS['URL'] = $_SERVER['REQUEST_URI'];
                $exceptionS['HTTP_REFERER'] = urldecode($_SERVER['HTTP_REFERER']);
                $traceAsArray = explode("\n", $exception->getTraceAsString());
                foreach ($traceAsArray as $k => $item) {
                    if (strpos($item, '/vendor/') !== false) {
                        unset($traceAsArray[$k]);
                    }
                }
                p($traceAsArray + $message);
                throw $exception;
            });
            $i++;
        }
    }
}
