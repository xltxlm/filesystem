<?php
/**
 * Created by PhpStorm.
 * User: xialintai
 * Date: 2018/1/11
 * Time: 11:29
 */

namespace xltxlm\helper\Ctroller;

use xltxlm\helper\Hclass\ConvertObject;

/**
 * 抛出此异常之后，框架执行流程后续的getxx不再执行了。并且会输出json格式的代码
 * Class RunInvokeBreakApi
 * @package xltxlm\helper\Ctroller
 */
class RunInvokeBreakApi
{
    private $code = 0;
    private $message = '';

    /** @var \Throwable 异常类 */
    private $Exception;
    //需要整个扔出去的对象
    protected $ConvertObject;

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


    public function __invoke()
    {
        ob_end_clean();
        if ($this->getConvertObject()) {
            $errormessage = (new ConvertObject($this->getConvertObject()))
                ->toJson();
            echo $errormessage;
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
        }
        $errormessage = json_encode($messageArray, JSON_UNESCAPED_UNICODE);
        echo $errormessage;
        return (new RunInvokeBreak($errormessage));
    }

}