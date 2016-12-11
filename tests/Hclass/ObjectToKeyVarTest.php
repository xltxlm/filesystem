<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-11
 * Time: 下午 7:54
 */

namespace xltxlm\helper\tests\Hclass;


use PHPUnit\Framework\TestCase;
use xltxlm\helper\tests\Resource\Hclass\ObjectToKeyVar\Demo;

class ObjectToKeyVarTest extends TestCase
{

    public function test1()
    {
        $var = (new Demo());
        $this->assertEquals($var, 'id=17 name=18 my_code=19');
    }
}