<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-06
 * Time: 下午 7:46
 */

namespace xltxlm\helper\tests\filesystem;

use HtmlParser\ParserDom;
use PHPUnit\Framework\TestCase;
use xltxlm\helper\tests\Resource\Template\Demo;
use xltxlm\helper\tests\Resource\Template\DemoAutoLoadTP;
use xltxlm\helper\tests\Resource\Template\Html;

class TemplateTest extends TestCase
{
    /**
     * 测试输出到文件
     */
    public function test0()
    {
        $saveToFileName = __DIR__ . DIRECTORY_SEPARATOR . 'out.txt';
        (new Demo())
            ->setId('123')
            ->setName('ok')
            ->setSaveToFileName($saveToFileName)
            ->__invoke();
        $this->assertFileExists($saveToFileName);
        $this->assertStringEqualsFile($saveToFileName, "id:123,name:ok");
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

    public function test3()
    {
        $id = 222;
        $name = "abc";
        $title = "hello";
        $Html = (new Html())
            ->setName($name)
            ->setId($id)
            ->setTitle($title)
            ->__invoke();
        $parserDom = (new ParserDom($Html))
            ->find("input[id=$id]");
        $this->assertInstanceOf(\HtmlParser\ParserDom::class, $parserDom[0]);
        $parserDom = (new ParserDom($Html))
            ->find("input[name=$name]");
        $this->assertInstanceOf(\HtmlParser\ParserDom::class, $parserDom[0]);
        $parserDom = (new ParserDom($Html))
            ->find("input[title=$title]");
        $this->assertInstanceOf(\HtmlParser\ParserDom::class, $parserDom[0]);
    }


}
