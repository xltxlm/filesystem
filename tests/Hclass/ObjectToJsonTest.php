<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-06
 * Time: 下午 11:10
 */

namespace xltxlm\helper\tests\Hclass;


use PHPUnit\Framework\TestCase;
use xltxlm\helper\tests\Resource\Hclass\ObjectToJson\Demo;

class ObjectToJsonTest extends TestCase
{

    public function test1()
    {
        $a = (new Demo());
        $this->assertEquals($a, '{"id":17,"name":18,"my_code":19}');
    }
}