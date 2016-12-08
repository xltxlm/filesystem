<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-08
 * Time: 上午 12:19
 */

namespace xltxlm\helper\Ctroller;

/**
 * 给一个类加上 __invoke 魔术函数,然后类会按照get的循序执行,其中任何一个抛异常也不会阻止代码继续运行
 *
 *  + 父类的 public getxxxx
 *  + 子类的 public getxxxx
 *  + 子类的 protected getxxxx
 *  + 父类的 protected getxxxx
 *
 * Class Invoke
 * @package xltxlm\helper\Ctroller
 */
trait Invoke
{
    final public function __invoke()
    {
    }
}