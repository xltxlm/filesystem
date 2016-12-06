<?php

namespace tests;

use PHPUnit\Framework\TestCase;
use xltxlm\helper\Hclass\ClassNameFromFile;

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-11-30
 * Time: 下午 4:10.
 */
class ClassNameFromFileTest extends TestCase
{
    /**
     * 一维名命名空间的.
     */
    public function test()
    {
        $className = (new ClassNameFromFile())
            ->setFilePath(__FILE__)
            ->getClassName();
        $this->assertEquals(ClassNameFromFileTest::class, $className);
    }
}
