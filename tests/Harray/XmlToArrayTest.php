<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-07
 * Time: 上午 10:54
 */

namespace xltxlm\helper\tests\Harray;

use PHPUnit\Framework\TestCase;
use xltxlm\helper\Harray\XmlToArray;

class XmlToArrayTest extends TestCase
{
    /**
     * 测试xml解析成数组,仅限于简单的一维xml
     */
    public function test1()
    {
        $xml = '<xml>
   <appid>wx2421b1c4370ec43b</appid>
   <attach>支付测试</attach>
   <body>APP支付测试</body>
   <mch_id>10000100</mch_id>
   <nonce_str>1add1a30ac87aa2db72f57a2375d8fec</nonce_str>
   <notify_url>http://wxpay.wxutil.com/pub_v2/pay/notify.v2.php</notify_url>
   <out_trade_no>1415659990</out_trade_no>
   <spbill_create_ip>14.23.150.211</spbill_create_ip>
   <total_fee>1</total_fee>
   <trade_type>APP</trade_type>
   <sign>0CB01533B8C1EF103065174F50BCA001</sign>
</xml>';
        $array = (new XmlToArray())
            ->setXml($xml)
            ->__invoke();
        $this->assertTrue(is_array($array));
        $this->assertEquals($array, [
            'appid' => 'wx2421b1c4370ec43b',
            'attach' => '支付测试',
            'body' => 'APP支付测试',
            'mch_id' => '10000100',
            'nonce_str' => '1add1a30ac87aa2db72f57a2375d8fec',
            'notify_url' => 'http://wxpay.wxutil.com/pub_v2/pay/notify.v2.php',
            'out_trade_no' => '1415659990',
            'spbill_create_ip' => '14.23.150.211',
            'total_fee' => 1,
            'trade_type' => 'APP',
            'sign' => '0CB01533B8C1EF103065174F50BCA001'
        ]);
    }
}
