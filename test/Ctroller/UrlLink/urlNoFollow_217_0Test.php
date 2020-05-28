<?php

namespace xltxlm\helper\test\Ctroller\UrlLink;

use PHPUnit\Framework\TestCase;

/**
 *
 */
class urlNoFollow_217_0Test extends TestCase
{
    use urlNoFollow_217_0Test\urlNoFollow_217_0Provider; #<---本次测试的数据供给来源

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
        return (new a())::urlNoFollow();
    }

}

class a
{
    use \xltxlm\helper\Ctroller\UrlLink;
}

