<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-01-22
 * Time: 下午 11:44
 */

namespace xltxlm\helper\tests\Hclass;


use PHPUnit\Framework\TestCase;
use xltxlm\helper\Hclass\MergeObject;
use xltxlm\helper\tests\Resource\Hclass\ObjectToArrayDemo;

class MergeObjectTest extends TestCase
{

    public function testArray()
    {
        $demo = new ObjectToArrayDemo;
        $LINE__ = __LINE__;
        $FILE__ = __FILE__;
        $changeArray = [
            'id' => $LINE__,
            'name' => '',
            'none' => 'none'
        ];
        $MergeObject = (new MergeObject($demo))
            ->setArray($changeArray);
        /** @var ObjectToArrayDemo $newObject */
        $newObject = $MergeObject->__invoke();
        // 返回的内容还是原先的对象
        $this->assertEquals(get_class($newObject), ObjectToArrayDemo::class);
        //原先的内容已经被覆盖了
        $this->assertEquals($newObject->getId(), $LINE__);
        //没有被覆盖掉
        $this->assertEquals($newObject->getName(), $demo->getName());

        $changeArray2 = [
            'name' => $FILE__,
            'none' => 'none'
        ];
        /** @var ObjectToArrayDemo $newObject2 */
        $newObject2 = (new MergeObject($newObject))
            ->setArray($changeArray2)
            ->__invoke();
        //确认新的会再次覆盖
        $this->assertEquals($newObject2->getName(), $FILE__);
    }

    public function testObject()
    {
        $demo = new ObjectToArrayDemo;
        $demoNew = new ObjectToArrayDemo;
        $LINE__ = __LINE__;
        $FILE__ = __FILE__;
        $demoNew->setId($LINE__);
        $newObject=(new MergeObject($demo))
            ->setObject($demoNew)
            ->__invoke();

        //原先的内容已经被覆盖了
        $this->assertEquals($newObject->getId(), $LINE__);
        //没有被覆盖掉
        $this->assertEquals($newObject->getName(), $demo->getName());
    }

}