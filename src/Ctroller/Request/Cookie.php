<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-09
 * Time: 上午 10:54.
 */

namespace xltxlm\helper\Ctroller\Request;

trait Cookie
{
    use Get;

    public function __construct()
    {
        $_SERVER[static::class] = &$_COOKIE;
        $this->load($_COOKIE);
    }
}
