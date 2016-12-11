<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-06
 * Time: 下午 11:10
 */

namespace xltxlm\helper\tests\Resource\Hclass\ObjectToJson;


use xltxlm\helper\Hclass\ObjectToJson;

final class Demo
{
    use ObjectToJson;
    protected $id = __LINE__;
    protected $name = __LINE__;
    protected $my_code = __LINE__;
}