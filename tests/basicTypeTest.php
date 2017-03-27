<?php
/**
 * Created by PhpStorm.
 * User: xialintai
 * Date: 2017/3/27
 * Time: 11:09
 */

namespace xltxlm\helper\tests;


use PHPUnit\Framework\TestCase;
use xltxlm\helper\BasicType;

class basicTypeTest extends TestCase
{

    public function test()
    {

        /** @var BasicType[] $arr */
        $arr = [];
        for ($i = 0; $i <= 10; $i++) {
            $arr[] = new BasicType($i * 2000);
        }

        echo "<pre>-->";
        print_r(json_encode($arr, JSON_UNESCAPED_UNICODE));
        echo "<--@in ".__FILE__." on line ".__LINE__."\n";

        foreach ($arr as $item) {
            ?>
            -><?= $item->setDecimalpoint(2)->setThousandMark()->setPercentage()->substr(1) ?><-

            <?php

        }

    }

    public function testEmail()
    {
        /** @var BasicType $BasicType */
        $BasicType = (new BasicType("xltxlm@qq.com"));
        echo "<pre>-->";
        print_r($BasicType->isEmail()());
        echo "<--@in ".__FILE__." on line ".__LINE__."\n";
    }


}