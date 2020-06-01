<?php

namespace xltxlm\helper\test\Hclass\ConvertObject;

use PHPUnit\Framework\TestCase;
use xltxlm\helper\Hclass\ConvertObject;

/**
 *
 */
class ConvertObject_223_0Test extends TestCase
{
    use ConvertObject_223_0Test\ConvertObject_223_0Provider; #<---本次测试的数据供给来源

    /**
     * @test
     * @dataProvider MyProvider <---本次测试的数据供给来源
     * $input 输入值
     * $expected 期望的结果
     */
    public function __invoke($input, $expected, $args)
    {
        $result = $this->runcode($input, $args);
        //最终进行判断
        $this->assertEquals($expected, $result);
    }

    /**
     * 真正的逻辑计算
     * $input 输入值
     * $expected 期望的结果
     */
    private function runcode($input, $args)
    {
        $convertObject = new ConvertObject(new \xltxlm\helper\Hclass\ConvertObject);
        if ($args) {
            ($convertObject)
                ->setfilter($args[0]);
        }
        return $convertObject
            ->toArray();

    }

}

