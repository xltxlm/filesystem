<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-25
 * Time: 下午 6:11
 */

namespace xltxlm\helper\tests;


use PHPUnit\Framework\TestCase;
use xltxlm\helper\tests\Resource\IntStringDemo;

class IntStringTest extends TestCase
{

    /**
     * 纯粹理论测试, 函数参数 是 字符串,数字的时候, 混传会不会崩溃     */
    public function test1()
    {
        $IntStringDemo = (new IntStringDemo);
        $IntStringDemo->setIntName(123);
        $this->assertEquals($IntStringDemo->getIntName(), "123");
        $this->assertEquals($IntStringDemo->getIntName(), 123);
        $IntStringDemo->setIntName("123");
        $this->assertEquals($IntStringDemo->getIntName(), "123");
        $this->assertEquals($IntStringDemo->getIntName(), 123);

        $IntStringDemo->setIntName("123abc");
        $this->assertEquals($IntStringDemo->getIntName(), "123");
        $this->assertEquals($IntStringDemo->getIntName(), 123);

        $IntStringDemo->setName(123);
        $this->assertEquals($IntStringDemo->getName(), "123");
        $this->assertEquals($IntStringDemo->getName(), 123);
        $IntStringDemo->setName("123abc");
        $this->assertEquals($IntStringDemo->getName(), "123abc");
    }
}