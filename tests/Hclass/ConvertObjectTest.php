<?php
/**
 * Created by PhpStorm.
 * User: xialintai
 * Date: 2017/1/13
 * Time: 10:14
 */

namespace xltxlm\helper\tests\Hclass;


use PHPUnit\Framework\TestCase;
use xltxlm\helper\Hclass\ConvertObject;
use xltxlm\helper\tests\Resource\Hclass\ObjectToArrayDemo;

class ConvertObjectTest extends TestCase
{

    public function testtoArray()
    {
        $ObjectToArrayDemo = (new ObjectToArrayDemo);
        $ConvertObject = (new ConvertObject)
            ->setObject($ObjectToArrayDemo)
            ->toArray();
        $this->assertEquals($ConvertObject['id'], $ObjectToArrayDemo->getId());
        $this->assertEquals($ConvertObject['name'], $ObjectToArrayDemo->getName());
    }

    public function testtoJson()
    {
        $ObjectToArrayDemo = (new ObjectToArrayDemo);
        $ConvertObjectJson = (new ConvertObject)
            ->setObject($ObjectToArrayDemo)
            ->toJson();
        $ConvertObject = json_decode($ConvertObjectJson, true);
        $this->assertEquals($ConvertObject['id'], $ObjectToArrayDemo->getId());
        $this->assertEquals($ConvertObject['name'], $ObjectToArrayDemo->getName());
    }
}