<?php
/**
 * Created by PhpStorm.
 * User: xialintai
 * Date: 2016/12/24
 * Time: 18:46
 */

namespace xltxlm\helper\tests\Resource\Hclass;


use xltxlm\helper\Hclass\ObjectToArray;

class ObjectToArrayDemo
{
    use ObjectToArray;
    protected $id = __LINE__;
    protected $name = __FILE__;
}