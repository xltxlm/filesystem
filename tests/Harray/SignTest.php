<?php
/**
 * Created by PhpStorm.
 * User: xialintai
 * Date: 2017/6/15
 * Time: 13:20
 */

namespace xltxlm\helper\tests\Harray;


use PHPUnit\Framework\TestCase;
use xltxlm\helper\Harray\Sign;

class SignTest extends TestCase
{

    public function test1()
    {
        $array = ['aa' => 11, 'dd' => 'er', 'bb' => 'abc', 'zz' => 'm?&m'];
        //测试get参数加密返回字符串
        $get = (new Sign())
            ->setArray($array)
            ->getGetParam();
        echo "<pre>-->";
        print_r($get);
        echo "<--@in " . __FILE__ . " on line " . __LINE__ . "\n";
        //测试post参数加密返回数组
        $post = (new Sign())
            ->setArray($array)
            ->setNeedKeys(['aa'])
            ->getPostParam();
        echo "<pre>-->";
        print_r($post);
        echo "<--@in " . __FILE__ . " on line " . __LINE__ . "\n";
        //测试解密验证
        $bool = (new Sign())
            ->setArray($post)
            ->setNeedKeys(['aa'])
            ->checkSign();
        $this->assertTrue($bool);
    }
}