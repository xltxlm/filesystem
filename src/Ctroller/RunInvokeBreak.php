<?php
/**
 * Created by PhpStorm.
 * User: xialintai
 * Date: 2017/12/29
 * Time: 13:50
 */

namespace xltxlm\helper\Ctroller;

/**
 * 抛出此异常之后，框架执行流程后续的getxx不再执行了。
 * Class RunInvokeBreak
 * @package xltxlm\helper\Ctroller
 */
class RunInvokeBreak extends \Exception
{
}