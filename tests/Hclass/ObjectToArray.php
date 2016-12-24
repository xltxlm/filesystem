<?php
/**
 * Created by PhpStorm.
 * User: xialintai
 * Date: 2016/12/24
 * Time: 18:39
 */

namespace xltxlm\helper\tests\Hclass;


use PHPUnit\Framework\TestCase;
use xltxlm\helper\tests\Resource\Hclass\ObjectToArrayDemo;

class ObjectToArray extends TestCase
{

    public function test1()
    {
        $demo = (new ObjectToArrayDemo())
            ->__toArray();
        $this->assertArrayHasKey('id', $demo);
    }
}