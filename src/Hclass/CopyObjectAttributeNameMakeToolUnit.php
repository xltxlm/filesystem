<?php
/**
 * Created by PhpStorm.
 * User: xialintai
 * Date: 2017/1/13
 * Time: 16:48.
 */

namespace xltxlm\helper\Hclass;

/**
 * 最小单元拷贝
 * Class CopyObjectAttributeNameMakeToolUnit.
 */
class CopyObjectAttributeNameMakeToolUnit
{
    /** @var \ReflectionClass */
    private $reflectionClass;
    /** @var string 类的名称 */
    protected $className = '';
    /** @var string 类的短名称 */
    protected $shortClassName = '';

    /**
     * @return \ReflectionClass
     */
    public function getReflectionClass(): \ReflectionClass
    {
        return $this->reflectionClass;
    }

    /**
     * @param \ReflectionClass $reflectionClass
     * @return CopyObjectAttributeNameMakeToolUnit
     */
    public function setReflectionClass(\ReflectionClass $reflectionClass): CopyObjectAttributeNameMakeToolUnit
    {
        $this->reflectionClass = $reflectionClass;
        return $this;
    }

    /**
     * @return string
     */
    public function getShortClassName(): string
    {
        return $this->shortClassName;
    }

    /**
     * @param string $shortClassName
     *
     * @return CopyObjectAttributeNameMakeToolUnit
     */
    public function setShortClassName(string $shortClassName): CopyObjectAttributeNameMakeToolUnit
    {
        $this->shortClassName = $shortClassName;

        return $this;
    }

    /**
     * @return string
     */
    public function getClassName(): string
    {
        return $this->className;
    }

    /**
     * @param string $className
     * @return static
     */
    public function setClassName(string $className)
    {
        $this->className = $className;
        $this->reflectionClass = (new \ReflectionClass($this->getClassName()));
        $this->shortClassName = $this->reflectionClass->getShortName();
        return $this;
    }

    public function __invoke()
    {
        ob_start();
        include __DIR__.'/CopyObjectAttributeNameMakeTool.tpl.php';
        file_put_contents(strtr($this->reflectionClass->getFileName(), ['.php' => '']).'Copy.php', ob_get_clean());
    }
}
