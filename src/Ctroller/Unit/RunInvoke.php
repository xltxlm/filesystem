<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-08
 * Time: 上午 12:19
 */

namespace xltxlm\helper\Ctroller\Unit;

use xltxlm\helper\Ctroller\HtmlException;

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
trait RunInvoke
{
    /** @var array 记录运行的方法的顺序 */
    protected $haveRunMethod = [];

    /**
     * @return array
     */
    final public function haveRunMethod(): array
    {
        return $this->haveRunMethod;
    }


    /**
     * 分析当前的执行顺序,逐个运行
     * @throws \Exception
     */
    final public function __invoke()
    {
        $classs = (new \ReflectionClass(static::class));
        $return = null;
        //public 先执行
        $realMethods_public = $this->getMethods(\ReflectionMethod::IS_PUBLIC);
        //protected稍后跟上
        $realMethods_protected = $this->getMethods(\ReflectionMethod::IS_PROTECTED);
        /** @var  \ReflectionMethod[] $realMethods */
        $realMethods = array_merge($realMethods_public, $realMethods_protected);
        foreach ($realMethods as $method) {
            try {
                $return1 = call_user_func([$this, $method->getName(),]);
                //只有子类的返回值才算返回值
                if ($method->getFileName() == $classs->getFileName()) {
                    $return = $return1;
                }
                $this->haveRunMethod[] = $method->getName();
            } catch (\Exception $Exception) {
                HtmlException::push($Exception);
            }
        }

        return $return;
    }

    /**
     * 把方法按照顺序返回
     *
     * @param int $type
     *
     * @return \ReflectionMethod[]
     */
    final private function getMethods($type = \ReflectionMethod::IS_PUBLIC)
    {
        $classs = $this->getParents(static::class);
        //公开方法的话,颠倒循序,让父类先解析
        $classs = array_reverse($classs);
        $classs[] = static::class;
        $traitss = $newClasss = [];
        foreach ($classs as $class) {
            $traits = (new GetTraitLists())
                ->setClassName($class)
                ->__invoke();
            $traitss += $traits;
            $newClasss += $traits;
            $newClasss[$class] = $class;
        }
        if ($type != \ReflectionMethod::IS_PUBLIC) {
            $newClasss = array_reverse($newClasss);
        }
        $realMethods = [];
        $lastClass = null;
        foreach ($newClasss as $class) {
            //重新获取方法列表.因为foreach循环改变了指针
            $ReflectionClass = new \ReflectionClass($class);
            $Methods2 = $ReflectionClass->getMethods($type);
            foreach ($Methods2 as $methodChild) {
                /** @var \ReflectionMethod $methodChild */
                //排除掉静态方法
                if ($methodChild->isStatic()) {
                    continue;
                }
                if ($methodChild->class <> $class) {
                    continue;
                }
                if (strpos($methodChild->getName(), 'get') === 0) {
                    $realMethods[$methodChild->getName()] = $methodChild;
                }
            }
        }
        return $realMethods;
    }

    final  private function getParents($class = null, $plist = [])
    {
        $class = $class ? $class : $this;
        $parent = get_parent_class($class);
        if ($parent) {
            $plist[] = $parent;
            /*Do not use $this. Use 'self' here instead, or you
             * will get an infinite loop. */
            $plist = self::getParents($parent, $plist);
        }

        return $plist;
    }
}
