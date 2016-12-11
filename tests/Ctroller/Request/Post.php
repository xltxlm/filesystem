<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-08
 * Time: 下午 8:36
 */

namespace xltxlm\helper\tests\Ctroller\Request;

use PHPUnit\Framework\TestCase;
use xltxlm\helper\tests\Resource\Ctroller\Request\DemoPost;

class Post extends TestCase
{
    public function test1()
    {
        $_GET = ['id' => __LINE__, "name" => __FUNCTION__];
        $_POST = ['id' => __LINE__, "name" => __FUNCTION__];
        $_REQUEST = ['id' => __LINE__, "name" => __FUNCTION__];
        $demoGet = new DemoPost();
        $this->assertEquals(
            $_POST['id'],
            ($demoGet)
                ->getId()
        );
        $this->assertEquals(
            $_POST['name'],
            ($demoGet)
                ->getName()
        );
        echo "$demoGet";
    }
}
