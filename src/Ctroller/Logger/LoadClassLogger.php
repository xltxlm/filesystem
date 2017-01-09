<?php
/**
 * Created by PhpStorm.
 * User: xialintai
 * Date: 2016/12/23
 * Time: 14:07.
 */

namespace xltxlm\helper\Ctroller\Logger;

use xltxlm\logger\Log\DefineLog;

/**
 * 常规日志记录,记录一个请求的耗时
 * Class LoadClassLogger.
 */
class LoadClassLogger extends DefineLog
{
    protected $className = '';

    /**
     * @return float
     */
    public function getTime(): float
    {
        return $this->time;
    }

    /**
     * @param float $time
     *
     * @return LoadClassLogger
     */
    public function setTime(float $time): LoadClassLogger
    {
        $this->time = $time;

        return $this;
    }

    /**
     * @return string
     */
    public function getClassName(): string
    {
        return $this->className;
    }

    /**
     * @param string $className
     *
     * @return LoadClassLogger
     */
    public function setClassName(string $className): LoadClassLogger
    {
        $this->className = $className;

        return $this;
    }
}
