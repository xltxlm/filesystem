<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-01-02
 * Time: 下午 2:55.
 */

namespace xltxlm\helper\tests\Ctroller\Request;

use PHPUnit\Framework\TestCase;
use xltxlm\helper\tests\Resource\Ctroller\Request\DemoPost;

/**
 * Class ExportTest.
 */
class Export extends TestCase
{
    public function test1()
    {
        $this->assertEmpty($_POST['id']);
        $this->assertEmpty($_POST['name']);
        $DemoPost = (new DemoPost());
        $id = '1122';
        $name = 'abc';
        $DemoPost
            ->setId($id)
            ->setName($name)
            ->export();
        $this->assertEquals($id, $_POST['id']);
        $this->assertEquals($name, $_POST['name']);
    }
}
