<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-17
 * Time: 下午 8:31.
 */

namespace xltxlm\helper\tests\Ctroller\RunInvoke;

class DemoRewiteCtroller
{
    use ParentDemoCtroller;
    protected $haveRunMethods = [];

    /**
     * @return array
     */
    public function haveRunMethods(): array
    {
        return $this->haveRunMethods;
    }

    public function getpublicDemoRewiteCtroller()
    {
        $this->haveRunMethods[] = __FUNCTION__.'@'.__CLASS__;
    }

    protected function getprotectedDemoRewiteCtroller()
    {
        $this->haveRunMethods[] = __FUNCTION__.'@'.__CLASS__;
    }

    public function getpublicParentDemoCtroller()
    {
        $this->haveRunMethods[] = __FUNCTION__.'@'.__CLASS__;
    }

    protected function getprotectedParentDemoCtroller()
    {
        $this->haveRunMethods[] = __FUNCTION__.'@'.__CLASS__;
    }
}
