<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-06
 * Time: 下午 7:46
 */

namespace xltxlm\helper\tests\filesystem;

use PHPUnit\Framework\TestCase;
use xltxlm\helper\tests\Resource\Template\Demo;
use xltxlm\helper\tests\Resource\Template\DemoAutoLoadTP;

class TemplateTest extends TestCase
{
    /**
     * 测试输出到文件
     */
    public function test0()
    {
        $saveToFileName = __DIR__.DIRECTORY_SEPARATOR.'out.txt';
        (new Demo())
            ->setId('123')
            ->setName('ok')
            ->setSaveToFileName($saveToFileName)
            ->__invoke();
        $this->assertFileExists($saveToFileName);
        $this->assertStringEqualsFile($saveToFileName,"id:123,name:ok");
    }

    /**
     * 测试返回
     */
    public function test1()
    {
        $out = (new Demo())
            ->setId('123')
            ->setName('ok')
            ->__invoke();
        $this->assertEquals($out, "id:123,name:ok");
    }

    /**
     * 测试模板自动加载当前文件夹下面的同名模板
     */
    public function test2()
    {
        $out = (new DemoAutoLoadTP())
            ->setId('123')
            ->setName('hello')
            ->__invoke();
        $this->assertEquals($out, "id:123,name:hello");
    }
}
