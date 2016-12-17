<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-17
 * Time: 下午 8:23.
 */

namespace xltxlm\helper\tests\Ctroller\RunInvoke;

use xltxlm\helper\Ctroller\Unit\RunInvoke;

trait ParentDemoCtroller
{
    use RunInvoke;

    public function getpublicParentDemoCtroller()
    {
        echo __FUNCTION__ . "\n";
    }

    protected function getprotectedParentDemoCtroller()
    {
        echo __FUNCTION__ . "\n";
    }
}
