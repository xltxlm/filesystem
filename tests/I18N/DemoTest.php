<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-10
 * Time: 下午 4:48.
 */

namespace xltxlm\helper\tests\I18N;

use PHPUnit\Framework\TestCase;
use xltxlm\helper\tests\Resource\I18N\Demo;

class DemoTest extends TestCase
{
    /**
     * 中文测试.
     */
    public function testCH()
    {
        $name = (new Demo())
            ->setLang('CH')
            ->getName();
        $this->assertEquals('中文姓名', $name);
    }

    /**
     * 中文测试.
     */
    public function testEN()
    {
        $name = (new Demo())
            ->setLang('EN')
            ->getName();
        $this->assertEquals('Enname', $name);
        //继承上次使用的语言
        $name = (new Demo())
            ->getName();
        $this->assertEquals('Enname', $name);
    }
}
