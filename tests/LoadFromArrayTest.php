<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-06
 * Time: 下午 9:35
 */

namespace xltxlm\helper\tests;

use PHPUnit\Framework\TestCase;
use xltxlm\helper\tests\Resource\LoadFromArray\Demo;
use xltxlm\helper\tests\Resource\LoadFromArray\DemoLine;

class LoadFromArrayTest extends TestCase
{
    public function test1()
    {
        $id = __LINE__;
        $name = __CLASS__;
        $data = [
            'id' => $id,
            'name' => $name,
            'none' => 'null'
        ];
        $Demo = (new Demo($data));
        $this->assertEquals($id, $Demo->getId());
        $this->assertEquals($name, $Demo->getName());
    }

    public function test2()
    {
        $name = "name";
        $id = __LINE__;
        $data = [
            'name' => $name,
            'my_id' => $id,
        ];
        $DemoLine = (new DemoLine($data));
        $this->assertEquals($id, $DemoLine->getMyId());
        $this->assertEquals($name, $DemoLine->getName());
    }
}
