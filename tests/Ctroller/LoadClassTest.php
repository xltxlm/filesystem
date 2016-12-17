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
     */
    public function test1()
    {
        (new LoadClass)
            ->setClassName('noexistClass')
            ->__invoke();
    }

    /**
     * 有$_SERVER['HTTP_REFERER'] 记录日志
     * @test
     */
    public function test2()
    {
        $_SERVER['HTTP_REFERER'] = "http://www.baidu.com/";
        (new LoadClass)
            ->setClassName('noexistClass')
            ->__invoke();
    }
}