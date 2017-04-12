<?php
/**
 * Created by PhpStorm.
 * User: xialintai
 * Date: 2017/3/2
 * Time: 13:45.
 */

namespace xltxlm\helper\Ctroller;

/**
 * 项目的加载类:给定一个类,可以自动加载Request类
 * Class LoadClassRegister.
 */
trait LoadClassRegister
{
    /** @var string 一个实体类的位置 */
    public static $rootClass = '';
    /** @var string 根命名空间 */
    public static $rootNamespce = '';
    /** @var string 根命名空间 */
    public static $rootDir = '';

    /**
     * LoadClassRegister constructor.
     */
    public function __construct($rootClass = "")
    {
        if ($rootClass) {
            $this->setRootClass($rootClass);
        }
    }

    /**
     * @param $rootClass
     * @return $this
     */
    public function setRootClass($rootClass)
    {
        $reflectionClass = new \ReflectionClass($rootClass);
        self::$rootClass = $rootClass;
        self::$rootNamespce = $reflectionClass->getNamespaceName();
        self::$rootDir = dirname($reflectionClass->getFileName());

        //自动加载请求类
        spl_autoload_register(function ($class) {
            if (strpos($class, 'Request') !== false) {
                $filepath = static::$rootDir.strtr($class, [static::$rootNamespce => '', '\\' => '/', 'Request' => '.Request']).'.php';
                eval('include_once  $filepath;');
            }
        });
        return $this;
    }
}
