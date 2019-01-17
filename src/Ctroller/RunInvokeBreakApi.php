<?php
/**
 * Created by PhpStorm.
 * User: xialintai
 * Date: 2018/1/11
 * Time: 11:29
 */

namespace xltxlm\helper\Ctroller;

use xltxlm\helper\Hclass\ConvertObject;
use xltxlm\helper\Util;

/**
 * 抛出此异常之后，框架执行流程后续的getxx不再执行了。并且会输出json格式的代码
 * Class RunInvokeBreakApi
 * @package xltxlm\helper\Ctroller
 */
class RunInvokeBreakApi
{
    private $code = 0;
    private $message = '';
    //json输出只能执行一次.
    private static $i = 0;

    /** @var \Throwable 异常类 */
    private $Exception;


    //需要扔出去一个数组 2选1 【优先】
    protected $JsonArray = [];
    //需要整个扔出去的对象 2选1 【其次】
    protected $ConvertObject;

    /**
     * @return array
     */
    public function getJsonArray(): string
    {
        return json_encode($this->JsonArray, JSON_UNESCAPED_UNICODE);
    }

    /**
     * @param array $JsonArray
     * @return RunInvokeBreakApi
     */
    public function setJsonArray(array $JsonArray): RunInvokeBreakApi
    {
        $this->JsonArray = $JsonArray;
        return $this;
    }


    /**
     * @return \Throwable
     */
    public function getException(): \Throwable
    {
        return $this->Exception;
    }

    /**
     * @param \Throwable $Exception
     * @return RunInvokeBreakApi
     */
    public function setException(\Throwable $Exception): RunInvokeBreakApi
    {
        $this->Exception = $Exception;
        return $this;
    }


    /**
     * @return int
     */
    public function getCode(): int
    {
        return $this->code;
    }

    /**
     * @param int $code
     * @return RunInvokeBreakApi
     */
    public function setCode(int $code): RunInvokeBreakApi
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $message
     * @return RunInvokeBreakApi
     */
    public function setMessage(string $message): RunInvokeBreakApi
    {
        $this->message = $message;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getConvertObject()
    {
        return $this->ConvertObject;
    }

    /**
     * @param mixed $ConvertObject
     * @return RunInvokeBreakApi
     */
    public function setConvertObject($ConvertObject)
    {
        $this->ConvertObject = $ConvertObject;
        return $this;
    }

    /** @var bool 数据采取压缩再输出 */
    protected $gzip = false;

    /**
     * @return bool
     */
    public function isGzip(): bool
    {
        return $this->gzip;
    }

    /**
     * @param bool $gzip
     * @return RunInvokeBreakApi
     */
    public function setGzip(bool $gzip): RunInvokeBreakApi
    {
        $this->gzip = $gzip;
        return $this;
    }


    public function __invoke()
    {
        $this::$i++;
        if ($this::$i > 1) {
            return new RunInvokeBreak;
        }
        header('Content-type: application/json');

        ob_end_clean();
        if ($this->JsonArray && $this->getJsonArray()) {
            $errormessage = $this->getJsonArray();
            echo $errormessage;
            return (new RunInvokeBreak($errormessage));
        }
        if ($this->getConvertObject()) {
            $errormessage = (new ConvertObject($this->getConvertObject()))
                ->toJson();
            if ($this->isGzip()) {
                echo gzcompress($errormessage, 9);
            } else {
                echo $errormessage;
            }
            return (new RunInvokeBreak($errormessage));
        }
        $debug_backtrace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS);
        $messageArray = [
            'code' => $this->getCode(),
            'message' => $this->getMessage(),
            'file' => $debug_backtrace[0]['file'],
            'line' => $debug_backtrace[0]['line']
        ];
        if ($this->Exception) {
            $messageArray['Exception'] = $this->getException()->getTraceAsString();
            $messageArray['Exceptionfile'] = $this->getException()->getFile();
            $messageArray['Exceptionline'] = $this->getException()->getLine();
        }
        $errormessage = json_encode($messageArray, JSON_UNESCAPED_UNICODE);
        if ($this->Exception) {
            Util::d([$_COOKIE, $messageArray]);
        }
        echo $errormessage;
        return (new RunInvokeBreak($errormessage));
    }

}