<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-06
 * Time: 下午 3:29
 */

namespace xltxlm\helper\tests;

use PHPUnit\Framework\TestCase;

class EmptyAttributeTest extends TestCase
{
    /**
     * 测试下empty能检测什么,内容格式就是用empty测试的
     * @test
     */
    public function test1()
    {
        $this->assertTrue(empty(null));
        $this->assertTrue(empty(false));
        $this->assertTrue(empty(""));
        $this->assertTrue(empty([]));
        $this->assertTrue(empty(0));
    }

    /**
     * @test
     * @expectedException \Exception
     */
    public function test2()
    {
        (new Resource\EmptyAttribute\Demo)
            ->__invoke();
    }
}
