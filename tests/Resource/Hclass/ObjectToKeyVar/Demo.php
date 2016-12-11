<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-11
 * Time: 下午 7:52
 */

namespace xltxlm\helper\tests\Resource\Hclass\ObjectToKeyVar;

use xltxlm\helper\Hclass\ObjectToKeyVar;

final class Demo
{
    use ObjectToKeyVar;
    protected $id = __LINE__;
    protected $name = __LINE__;
    protected $my_code = __LINE__;
}
