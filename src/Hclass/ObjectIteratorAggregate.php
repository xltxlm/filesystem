<?php
/**
 * Created by PhpStorm.
 * User: xialintai
 * Date: 2017/3/27
 * Time: 16:47
 */

namespace xltxlm\helper\Hclass;

use ArrayIterator;
use xltxlm\helper\BasicType;

/**
 * 将一个类变成可以被foreach的类,输出属性和值
 * Class IteratorAggregate
 * @package xltxlm\helper\Hclass
 */
abstract class ObjectIteratorAggregate implements \IteratorAggregate
{
    public function getIterator()
    {
        $ArrayIterator = [];
        foreach (get_object_vars($this) as $key => $get_object_var) {
            $ArrayIterator[$key] = new BasicType($get_object_var);
        }
        return new ArrayIterator($ArrayIterator);
    }
}