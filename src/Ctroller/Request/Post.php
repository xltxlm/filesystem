<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-08
 * Time: 下午 8:34.
 */

namespace xltxlm\helper\Ctroller\Request;

trait Post
{
    use Get;

    public function __construct()
    {
        $_SERVER[static::class] = &$_POST;
        $this->load($_POST);
    }
}
