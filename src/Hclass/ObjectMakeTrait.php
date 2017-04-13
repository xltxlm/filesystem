<?php
/**
 * Created by PhpStorm.
 * User: xialintai
 * Date: 2017/3/2
 * Time: 13:32.
 */

namespace xltxlm\helper\Hclass;

use xltxlm\helper\Ctroller\LoadClassRegister;

/**
 * 给定对象名称,生成一个trait的文件.
 * Class ObjectTrait.
 */
class ObjectMakeTrait
{
    use LoadClassRegister;
    /** @var string */
    protected $className = '';
    /** @var \ReflectionClass */
    protected $ReflectionClass;
    /** @var string 命名空间 */
    private $nameSpace = '';

    /**
     * @return string
     */
    public function getClassName(): string
    {
        return $this->className;
    }

    /**
     * @return \ReflectionClass
     */
    public function getReflectionClass(): \ReflectionClass
    {
        return $this->ReflectionClass;
    }


    /**
     * @param string $className
     *
     * @return ObjectMakeTrait
     */
    public function setClassName(string $className): ObjectMakeTrait
    {
        $this->className = $className;
        $this->ReflectionClass = (new \ReflectionClass($className));
        $this->nameSpace = $this->ReflectionClass->getNamespaceName();

        return $this;
    }

    /**
     * @return string
     */
    public function getNameSpace(): string
    {
        return $this->nameSpace;
    }

    public function __invoke()
    {
        ob_start();
        include __DIR__.'/ObjectMakeTrait.tpl.php';
        $shortName = $this->ReflectionClass->getShortName();
        $shortName = strtr($shortName, ["Request" => ".Request"]);
        $filePath = dirname($this->ReflectionClass->getFileName())."/".$shortName."Trait.php";
        $ob_get_clean = ob_get_clean();
        //确保文件的内容不一致才写入
        if (file_get_contents($filePath) !== $ob_get_clean) {
            file_put_contents($filePath, $ob_get_clean);
        }
    }
}
