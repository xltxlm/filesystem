<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-08
 * Time: 下午 8:34
 */

namespace xltxlm\helper\Ctroller\Request;

trait Post
{
    use Get;
    abstract public function load(array $array);

    public function __construct()
    {
        $this->load($_POST);
    }
}
