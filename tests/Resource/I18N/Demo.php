<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-10
 * Time: 下午 4:43
 */

namespace xltxlm\helper\tests\Resource\I18N;

use xltxlm\helper\I18N\I18N;

class Demo extends I18N
{
    protected $name;

    /**
     * @return mixed
     */
    public function getName()
    {
        return self::getVal();
    }
}
