<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-17
 * Time: 下午 8:25.
 */

namespace xltxlm\helper\tests\Ctroller;

use PHPUnit\Framework\TestCase;
use xltxlm\helper\tests\Ctroller\RunInvoke\DemoCtroller;
use xltxlm\helper\tests\Ctroller\RunInvoke\DemoRewiteCtroller;

class RunInvokeTest extends TestCase
{
    /**
     * 常规的执行顺序.
     * @test
     */
    public function test1()
    {
        $demoCtroller = new DemoCtroller();
        $demoCtroller
            ->__invoke();
        $this->assertEquals(
            $demoCtroller->haveRunMethod(),
            [
                'getpublicParentDemoCtroller',
                'getpublicDemoCtroller',
                'getprotectedDemoCtroller',
                'getprotectedParentDemoCtroller',
            ]
        );
    }

    /**
     * 子类重写上级的类,执行名称的顺序没变, 只是运行的都是子类的内容.
     * @test
     */
    public function test2()
    {
        $demoCtroller = new DemoRewiteCtroller();
        $demoCtroller
            ->__invoke();
        $this->assertEquals(
            $demoCtroller->haveRunMethod(),
            [
                'getpublicParentDemoCtroller',
                'getpublicDemoRewiteCtroller',
                'getprotectedDemoRewiteCtroller',
                'getprotectedParentDemoCtroller',
            ]
        );
        $this->assertEquals(
            $demoCtroller->haveRunMethods(),
            [
                'getpublicParentDemoCtroller@xltxlm\helper\tests\Ctroller\RunInvoke\DemoRewiteCtroller',
                'getpublicDemoRewiteCtroller@xltxlm\helper\tests\Ctroller\RunInvoke\DemoRewiteCtroller',
                'getprotectedDemoRewiteCtroller@xltxlm\helper\tests\Ctroller\RunInvoke\DemoRewiteCtroller',
                'getprotectedParentDemoCtroller@xltxlm\helper\tests\Ctroller\RunInvoke\DemoRewiteCtroller',
            ]
        );
    }
}
