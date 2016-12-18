<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-17
 * Time: 下午 8:07
 */

namespace xltxlm\helper\tests\Ctroller;


use PHPUnit\Framework\TestCase;
use xltxlm\helper\Ctroller\LoadClass;

class LoadClassTest extends TestCase
{
    /**
     * 没有$_SERVER['HTTP_REFERER'],不记录错误
     * @test
     * @throws \PHPUnit_Framework_Error
     */
    public function test1()
    {
        $this->markTestSkipped("类不存在,跳过测试");
        (new LoadClass)
            ->setClassName('noexistClass')
            ->__invoke();
    }

    /**
     * 有$_SERVER['HTTP_REFERER'] 记录日志
     * @test
     * @expectedException  \Exception
     */
    public function test2()
    {
        $this->markTestSkipped("类不存在,跳过测试");
        $_SERVER['HTTP_REFERER'] = "http://www.baidu.com/";
        (new LoadClass)
            ->setClassName('noexistClass')
            ->__invoke();
    }
}