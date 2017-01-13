<?php
/**
 * Created by PhpStorm.
 * User: xialintai
 * Date: 2017/1/13
 * Time: 16:46.
 */

namespace xltxlm\helper\Hclass;

/**
 * 根据类,生成对应的属性名称拷贝类,文件的生成位置在文件的边上
 * Class CopyObjectAttributeNameMakeTool.
 */
class CopyObjectAttributeNameMakeTool
{
    /** @var array 需要生成的类的名称 */
    protected $classNames = [];
    /** @var string web运行的基准类,类的命名空间只要在项目里面就可以 */
    protected $rootClass = '';

    protected static $rootNamespce;
    protected static $rootDir;

    /**
     * @return string
     */
    public function getRootClass(): string
    {
        return $this->rootClass;
    }

    /**
     * @param string $rootClass
     *
     * @return CopyObjectAttributeNameMakeTool
     */
    public function setRootClass(string $rootClass): CopyObjectAttributeNameMakeTool
    {
        $reflectionClass = new \ReflectionClass($rootClass);
        self::$rootNamespce = $reflectionClass->getNamespaceName();
        self::$rootDir = dirname($reflectionClass->getFileName());
        $this->rootClass = $rootClass;

        return $this;
    }

    /**
     * @return array
     */
    public function getClassNames(): array
    {
        return $this->classNames;
    }

    /**
     * @param string $classNames
     *
     * @return CopyObjectAttributeNameMakeTool
     */
    public function setClassNames(string $classNames): CopyObjectAttributeNameMakeTool
    {
        $this->classNames[] = $classNames;

        return $this;
    }

    public function __invoke()
    {
        //自动加载请求类
        spl_autoload_register(function ($class) {
            if (strpos($class, 'Request') !== false) {
                $filepath = self::$rootDir.strtr($class, [self::$rootNamespce => '', '\\' => '/', 'Request' => '.Request']).'.php';
                eval('include_once  $filepath;');
            }
        });

        foreach ($this->getClassNames() as $className) {
            (new CopyObjectAttributeNameMakeToolUnit())
                ->setClassName($className)
                ->__invoke();
        }
    }
}
