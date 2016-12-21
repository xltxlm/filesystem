<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-21
 * Time: 下午 10:40
 */

namespace xltxlm\helper\tests\Ctroller\Request;


use PHPUnit\Framework\TestCase;
use xltxlm\helper\tests\Resource\Ctroller\Request\DemoPost;

class RequestName extends TestCase
{
    /**
     * 测试获取变量的名称
     * @test
     */
    public function test1()
    {
        $DemoPost = (new DemoPost);
        $this->assertEquals($DemoPost->varName($DemoPost->getId()), 'id');
        $this->assertEquals($DemoPost->varName($DemoPost->getName()), 'name');
    }
}