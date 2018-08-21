<?php
/**
 * Created by PhpStorm.
 * User: xialintai
 * Date: 2018/7/16
 * Time: 上午10:27
 */

namespace xltxlm\allinone\vendor\xltxlm\helper\src\Ctroller;

use xltxlm\helper\Ctroller\RunInvokeBreakApi;

/**
 * 由于代码执行时间可能过长,主动断开了和客户端之间的链接,但是代码还是继续执行
 * Class BreakConnect
 * @package xltxlm\allinone\vendor\xltxlm\helper\src\Ctroller
 */
trait BreakConnect
{
    final public function BreakConnetLink()
    {
        //直接断开连接
        ignore_user_abort();
        fastcgi_finish_request();
    }

    final public function BreakConnetLinkApi()
    {
        (new RunInvokeBreakApi())
            ->__invoke();
        //直接断开连接
        ignore_user_abort();
        fastcgi_finish_request();
    }
}