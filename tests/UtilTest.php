<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-17
 * Time: 下午 4:01.
 */

namespace xltxlm\helper\tests;

use PHPUnit\Framework\TestCase;
use xltxlm\helper\Util;

class UtilTest extends TestCase
{
    public function test1()
    {
        Util::d('aaa');
        Util::d(['aaa']);
        Util::d(new Util());
    }
}
