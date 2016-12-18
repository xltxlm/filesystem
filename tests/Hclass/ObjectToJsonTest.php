<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-06
 * Time: 下午 11:10.
 */

namespace xltxlm\helper\tests\Hclass;

use PHPUnit\Framework\TestCase;
use xltxlm\helper\tests\Resource\Hclass\ObjectToJson\Demo;

class ObjectToJsonTest extends TestCase
{
    public function test1()
    {
        $demo = (new Demo());
        $this->assertEquals("$demo", '{"id":16,"name":17,"my_code":18}');
    }
}
