<?php
/**
 * Created by PhpStorm.
 * User: xlt
 * Date: 2016/6/7
 * Time: 9:19.
 */

namespace xltxlm\helper\Ctroller;

use xltxlm\helper\Url\FixUrl;

/**
 * out:ctroller层的类转换成相对的网址链接
 * Class UrlLink.
 */
trait UrlLink
{
    /**
     * @desc   根据当前的类,换成对应的网址路径
     *
     * @param array $args
     * @param null  $classname
     *
     * @return string
     */
    final public static function url($args = [], $classname = null)
    {
        $appendArgs = $_GET;
        unset($appendArgs['c'], $_GET['__SIGN_KEY__'], $_GET['__ID__']);

        return self::urlNoFollow($args + $appendArgs, $classname);
    }

    /**
     * @desc   根据当前的类,换成对应的网址路径
     *
     * @param array $args
     * @param null  $classname
     *
     * @return string
     */
    final public static function urlNoFollow($args = [], $classname = null)
    {
        if (!$classname) {
            $classname = static::class;
        }
        $model_action = strtr($classname, [LoadClass::$rootNamespce => '']);

        echo '<pre>-->';
        print_r($model_action);
        echo '<--@in '.__FILE__.' on line '.__LINE__."\n";

        return (new FixUrl('/'.implode('/', $model_action)))
            ->setAttachKesy($args)
            ->__invoke();
    }

    /**
     * @desc   网址跳转
     *
     * @param array $args
     * @param null  $classname
     */
    final public static function gourl($args = [], $classname = null)
    {
        $url = self::url(
            $args,
            $classname
        );

        (new go())->execute($url);
    }

    /**
     * @desc   网址跳转
     *
     * @author 夏琳泰 mailto:xialt@citssh.com.cn
     *
     * @since  2015-08-17 08:38:05
     *
     * @param array $args
     * @param null  $classname
     */
    final public static function gourlNoFollow($args = [], $classname = null)
    {
        $url = self::urlNoFollow(
            $args,
            $classname
        );

        (new go())->execute(
            $url
        );
    }

    final public static function goBack()
    {
        (new go())->execute(
            $_SERVER['HTTP_REFERER']
        );
    }
}
