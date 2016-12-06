<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-06
 * Time: 下午 3:30
 */
namespace xltxlm\helper\tests\EmptyAttribute;

use xltxlm\helper\Hclass\EmptyAttribute;

class Demo
{
    use EmptyAttribute;

    protected $name='abc';
    protected $id=0;

    function __invoke()
    {
        $this->notify([$this->name,$this->id]);
    }


}