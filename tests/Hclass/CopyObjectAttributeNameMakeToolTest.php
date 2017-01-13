<?php
/**
 * Created by PhpStorm.
 * User: xialintai
 * Date: 2017/1/13
 * Time: 17:01
 */

namespace xltxlm\helper\tests\Hclass;


use PHPUnit\Framework\TestCase;
use xltxlm\helper\Hclass\CopyObjectAttributeNameMakeTool;
use xltxlm\helper\tests\Resource\Hclass\ObjectToArrayDemo;

class CopyObjectAttributeNameMakeToolTest extends TestCase
{

    public function test()
    {
        (new CopyObjectAttributeNameMakeTool)
            ->setRootClass(self::class)
            ->setClassNames(ObjectToArrayDemo::class)
            ->__invoke();
    }
}