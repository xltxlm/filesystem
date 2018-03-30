<?php
/**
 * Created by PhpStorm.
 * User: xialintai
 * Date: 2017/4/10
 * Time: 18:57
 */

namespace xltxlm\helper\Ctroller;


use xltxlm\helper\Util;

/**
 * 异常捕捉输出
 * Class set_exception_handler
 * @package xltxlm\allinone\vendor\xltxlm\helper\src\Ctroller
 */
class SetExceptionHandler
{

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
                /** @var \Exception $exception */
                $message = [
                    "ERROR" => $exception->getMessage(),
                    "FILE" => $exception->getFile(),
                    "LINE" => $exception->getLine(),
                    'HTTP_REFERER' => $_SERVER['HTTP_REFERER'],
                    'URL' => $_SERVER['REQUEST_URI'],
                    'POST' => $_POST,
                    'IP' => $_SERVER['REMOTE_ADDR'],
                ];
                $exceptionS['GET'] = $_GET;
                $exceptionS['POST'] = $_POST;
                $exceptionS['URL'] = $_SERVER['REQUEST_URI'];
                $exceptionS['HTTP_REFERER'] = $_SERVER['HTTP_REFERER'];
                $exceptionS[] = $message['ERROR']."\t".$message['FILE'].':'.$message['LINE'];
                Util::d($exception->getTraceAsString());
                $json_encode = json_encode($message, JSON_UNESCAPED_UNICODE);
                throw new \Exception($json_encode);
            });
            $i++;
        }
    }
}
