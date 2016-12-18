<?php
/**
 * Created by PhpStorm.
 * User: xlt
 * Date: 2016/7/3
 * Time: 17:30.
 */

namespace xltxlm\helper\Ctroller\Unit;

/**
 * 递归取出某个类的全部继承 trait
 * Class traits.
 */
final class GetTraitLists
{
    protected $className;
    protected $newClasss;

    /**
     * @param mixed $className
     *
     * @return GetTraitLists
     */
    public function setClassName($className)
    {
        $this->className = $className;

        return $this;
    }

    public function __invoke($trait = null)
    {
        $ReflectionClass = new \ReflectionClass($trait ?? $this->className);
        $traits = $ReflectionClass->getTraitNames();
        foreach ($traits as $trait) {
            //先挂钩父类的traits
            self::__invoke($trait);
            $this->newClasss[$trait] = $trait;
        }

        return $this->newClasss ?: [];
    }
}
