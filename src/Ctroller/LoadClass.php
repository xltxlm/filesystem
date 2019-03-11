<?php
/**
 * Created by PhpStorm.
 * User: xlt
 * Date: 2016/3/21
 * Time: 9:16.
 */

namespace xltxlm\helper\Ctroller;

use Psr\Log\LogLevel;
use xltxlm\logger\Operation\Action\LoadClassLog;
use xltxlm\helper\Util;
use xltxlm\logger\Log\DefineLog;
use xltxlm\logger\Operation\EnumResource;
use xltxlm\logger\Thelostlog_thread\Thelostlog_thread;

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
     * @throws \Exception
     *
     * @return $this
     *
     * @see http://php.net/manual/en/language.oop5.magic.php#language.oop5.magic.invoke
     */
    public function __invoke()
    {
        SetExceptionHandler::instance();
        if (!$this->className) {
            $this->className = '\\' . self::$rootNamespce . '\\' . $this->urlPath;
        }
        //记录页面的执行时间
        $thelostlog_thread = new Thelostlog_thread;
        try {
            /** @var \xltxlm\helper\Ctroller\Unit\RunInvoke $classNameObject */
            //在调起函数之前,判断是否有回调钩子,如果有,那么回调下
            if(class_exists($this->className) && function_exists('\checkclass'))
            {
                \checkclass($this->className);
            }
            $classNameObject = new $this->className();
            //声明代码正确找到位置,找到类
            self::$runClass = get_class($classNameObject);
            call_user_func([$classNameObject, '__invoke']);
        } catch (\Exception $e) {
            $thelostlog_thread
                ->seterror_message("{$e->getMessage()} | {$e->getFile()}@{$e->getLine()}");
            unset($thelostlog_thread);
            throw $e;
        } finally {
            $this->className = substr(strtr($this->className, ['/' => '\\']), 1);
            if (!in_array($this->className, get_declared_classes())) {
                header('HTTP/1.1 588 APP ERROR@' . $this->className);
                header('Status: 588 APP ERROR@' . $this->className);
                if ($_GET['c'] == 'a') {
                    header("Content-type:application/json");
                    echo json_encode($_SERVER, JSON_UNESCAPED_UNICODE);
                }
            }
            unset($thelostlog_thread);
        }
        return $this;
    }
}
