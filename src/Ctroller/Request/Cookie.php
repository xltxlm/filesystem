<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-09
 * Time: 上午 10:54
 */

namespace xltxlm\helper\Ctroller\Request;

trait Cookie
{
    use Get;
    abstract public function load(array $array);

    public function __construct()
    {
        $this->load($_COOKIE);
    }
}
