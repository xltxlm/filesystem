<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-17
 * Time: 下午 8:23.
 */

namespace xltxlm\helper\tests\Ctroller\RunInvoke;

class DemoCtroller
{
    use ParentDemoCtroller;

    public function getpublicDemoCtroller()
    {
        echo __FUNCTION__."\n";
    }

    protected function getprotectedDemoCtroller()
    {
        echo __FUNCTION__."\n";
    }
}
