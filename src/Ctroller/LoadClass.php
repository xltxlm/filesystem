<?php
/**
 * Created by PhpStorm.
 * User: xlt
 * Date: 2016/3/21
 * Time: 9:16.
 */

namespace xltxlm\helper\Ctroller;

use xltxlm\helper\Ctroller\Unit\RunInvoke;

/**
 * 调起路由类,两种加载方式 1: 直接指定类 2: 命名空间 + 命名空间下面的相对路径
 * Class LoadClass.
 */
final class LoadClass
{
    use LoadClassRegister;

    /** @var string 当前正在运行的类 */
    public static $runClass = '';
    /** @var string 启动的类 */
    private $className = '';
    /** @var string 相对于根命名空间的路径 */
    private $urlPath = '';

    /**
     * @param string $className
     *
     * @return LoadClass
     */
    public function setClassName(string $className): LoadClass
    {
        $this->className = $className;

        return $this;
    }

    /**
     * @param string $urlPath
     *
     * @return LoadClass
     */
    public function setUrlPath($urlPath)
    {
        $this->urlPath = strtr($urlPath, ['/' => '\\']);

        return $this;
    }

    /**
     * The __invoke method is called when a script tries to call an object as a function.
     *
     * @return $this
     *
     * @throws \Exception
     *
     * @see http://php.net/manual/en/language.oop5.magic.php#language.oop5.magic.invoke
     */
    public function __invoke()
    {
        SetExceptionHandler::instance();
        if (!$this->className) {
            $this->className = self::$rootNamespce . '\\' . $this->urlPath;
        }
        try {
            //首先尝试下类是不是存在，如果不存在，那么尝试grpc目录
            if (!class_exists($this->className)) {
                $this->className = strtr($this->className, ["\\App\\Grpc" => "\\Grpc"]);
            }
            /** @var RunInvoke $classNameObject */
            //在调起函数之前,判断是否有回调钩子,如果有,那么回调下. 注:checkclass函数代码如果存在,那么写在Siteroot/index.php
            if (class_exists($this->className) && function_exists('\checkclass')) {
                call_user_func("\checkclass", $this->className);
            }
            $classNameObject = new $this->className();
            //声明代码正确找到位置,找到类
            self::$runClass = get_class($classNameObject);
            call_user_func([$classNameObject, '__invoke']);
        } catch (\Exception $e) {
            throw $e;
        } finally {
            $this->className = strtr($this->className, ['/' => '\\']);
            if (!in_array($this->className, get_declared_classes())) {
                p(['588', $this->className]);
                header('HTTP/1.1 588 APP ERROR@' . $this->className, false);
                header('Status: 588 APP ERROR@' . $this->className, false);
            }
        }
        return $this;
    }
}
