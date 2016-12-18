<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-11-14
 * Time: 上午 10:49.
 */
namespace xltxlm\helper\I18N;

/**
 * out:可翻译的语言配置
 * Class I18N.
 */
abstract class I18N
{
    //目前内置2种语言支持,默认是中文
    const CH = 'CH';
    const EN = 'EN';
    protected static $lang = self::CH;

    /**
     * @param string $lang
     *
     * @return $this
     */
    final public function setLang(string $lang)
    {
        self::$lang = $lang;
        return $this;
    }

    /**
     * @return string
     */
    final public static function getLang(): string
    {
        return self::$lang;
    }

    /**
     * @return string
     */
    final public static function cleanLang(): string
    {
        return self::$lang = "";
    }

    final public static function getVal()
    {
        $debug_backtrace = debug_backtrace();
        $key = lcfirst(substr($debug_backtrace[1]['function'], 3));
        $ReflectionClass = new \ReflectionClass($debug_backtrace[1]['class']);
        //获取语言类名
        $className = $ReflectionClass->getNamespaceName().
            '\\'.self::getLang().
            '\\'.basename($debug_backtrace[0]['file'], '.php');
        $I18NObject = new $className;
        $reflectionClass = new \ReflectionClass($I18NObject);
        $property = $reflectionClass->getProperty($key);
        $property->setAccessible(true);

        return $property->getValue($I18NObject);
    }
}
