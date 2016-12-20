<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-09
 * Time: 上午 10:53.
 */

namespace xltxlm\helper\Ctroller\Request;

trait Request
{
    use Get;

    public function __construct()
    {
        $this->load($_REQUEST);
    }
}
