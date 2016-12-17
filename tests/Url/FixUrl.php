<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-17
 * Time: 下午 5:54.
 */

namespace xltxlm\helper\tests\Url;

use PHPUnit\Framework\TestCase;

class FixUrl extends TestCase
{
    /**
     * 测试追加参数
     * @test
     */
    public function test1()
    {
        $url = 'http://www.baidu.com';
        $newUrl = (new \xltxlm\helper\Url\FixUrl())
            ->setUrl($url)
            ->setAttachKesy(['name' => 1, 'c' => 'd'])
            ->__invoke();
        $this->assertEquals($newUrl, 'http://www.baidu.com?name=1&c=d');
    }

    /**
     * 测试覆盖原来的参数
     * @test
     */
    public function test2()
    {
        $url = 'http://www.baidu.com?c=c';
        $newUrl = (new \xltxlm\helper\Url\FixUrl())
            ->setUrl($url)
            ->setAttachKesy(['name' => 1, 'c' => 'd'])
            ->__invoke();
        $this->assertEquals($newUrl, 'http://www.baidu.com?c=d&name=1');
    }

    /**
     * 测试删除参数
     * @test
     */
    public function test3()
    {
        $url = 'http://www.baidu.com?c=c';
        $newUrl = (new \xltxlm\helper\Url\FixUrl())
            ->setUrl($url)
            ->setUnserKeys(["c"])
            ->setAttachKesy(['name' => 1])
            ->__invoke();
        $this->assertEquals($newUrl, 'http://www.baidu.com?name=1');
    }

}
