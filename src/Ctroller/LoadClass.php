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
        $loadClassLog = (new LoadClassLog(true))
            ->setSqlaction(EnumResource::WAN_ZHI)
            ->setTableName($this->className);
        register_shutdown_function(function ($className) use ($loadClassLog) {
            //记录网页执行时间,如果超过1秒,标记为超时
            $loadClassLog
                ->setType(LogLevel::INFO)
                ->setClassName($className)();
        },
            $this->className
        );
        try {
            /** @var \xltxlm\helper\Ctroller\Unit\RunInvoke $classNameObject */
            $classNameObject = new $this->className();
            //声明代码正确找到位置,找到类
            self::$runClass = get_class($classNameObject);
            call_user_func([$classNameObject, '__invoke']);
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
        }

        return $this;
    }
}
