<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-17
 * Time: 下午 7:35
 */

namespace xltxlm\helper\Ctroller\Logger;


use xltxlm\logger\Log\DefineLog;

class LoadError extends DefineLog
{
    /** @var string 找不到的类名称 */
    protected $missClassName = "";

    /**
     * @return string
     */
    public function getMissClassName(): string
    {
        return $this->missClassName;
    }

    /**
     * @param string $missClassName
     * @return LoadError
     */
    public function setMissClassName(string $missClassName): LoadError
    {
        $this->missClassName = $missClassName;
        return $this;
    }

}