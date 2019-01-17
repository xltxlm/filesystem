<?php
/**
 * Created by PhpStorm.
 * User: xialintai
 * Date: 2018/1/29
 * Time: 13:13
 */

namespace xltxlm\helper\Shell;

use xltxlm\helper\Util;

/**
 * 执行远程/本地的shell代码
 * Class Exec
 * @package xltxlm\helper\Shell
 */
class Exec
{
    /** @var string 执行的命令 */
    protected $cmd = "";
    /** @var bool 如果有错误就抛出异常 */
    protected $checkError = true;
    /** @var bool 是否输出调试命令 */
    protected $debug = true;

    /**
     * @return bool
     */
    public function isDebug(): bool
    {
        return $this->debug;
    }

    /**
     * @param bool $debug
     * @return Exec
     */
    public function setDebug(bool $debug): Exec
    {
        $this->debug = $debug;
        return $this;
    }


    /**
     * @return bool
     */
    public function isCheckError(): bool
    {
        return $this->checkError;
    }

    /**
     * @param bool $checkError
     * @return Exec
     */
    public function setCheckError(bool $checkError): Exec
    {
        $this->checkError = $checkError;
        return $this;
    }


    /**
     * @return string
     */
    public function getCmd(): string
    {
        return $this->cmd;
    }

    /**
     * @param string $cmd
     * @return Exec
     */
    public function setCmd(string $cmd): Exec
    {
        $this->cmd = $cmd;
        return $this;
    }


    public function __invoke()
    {
        return (new \xltxlm\shell\Exec)
            ->setDebug($this->isDebug())
            ->setCmd($this->getCmd())
            ->setException_on_Fail($this->isCheckError())
            ->__invoke();
    }
}