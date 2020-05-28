<?php
/**
 * Created by PhpStorm.
 * User: xlt
 * Date: 2016/6/7
 * Time: 9:19.
 */

namespace xltxlm\helper\Ctroller;

use xltxlm\helper\Ctroller\UrlLink\UrlLink_implements;
use xltxlm\helper\Url\FixUrl;
use xltxlm\str\Str;

/**
 * out:ctroller层的类转换成相对的网址链接
 * Class UrlLink.
 */
trait UrlLink
{
    use UrlLink_implements;

    /**
     * 当前的网址,并且编码过的
     */
    public static function Myurl()
    {
        return urlencode("http" . ($_SERVER['HTTPS'] || $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https' ? 's' : '') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    }

    /**
     * @desc   根据当前的类,换成对应的网址路径
     *
     * @param array $args
     * @param null  $classname
     *
     * @return string
     */
    public static function url($args = [], $classname = null)
    {
        // 如果链接为空,不做处理
        if (static::class == __TRAIT__ && empty($classname)) {
            return '';
        }
        $appendArgs = $_GET;
        unset($appendArgs['c']);
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
    public static function urlencode($args = [], $classname = null)
    {
        return urlencode(self::url($args, $classname));
    }

    /**
     * @desc   根据当前的类,换成对应的网址路径
     *
     * @param array $args
     * @param null  $classname
     *
     * @return string
     */
    public static function urlNoFollow(array $args = [], $classname = null)
    {
        // 如果链接为空,不做处理
        if (static::class == __TRAIT__ && empty($classname)) {
            return '';
        }
        if (!$classname) {
            $classname = static::class;
        }
        //获取c参数的路径
        $model_action = (new Str($classname))
                ->Split('\\')
                ->getbyIndex(-2) .
            '/' .
            (new Str($classname))
                ->Split('\\')
                ->getbyIndex(-1);

        return (new FixUrl())
            ->setAttachKesy(["c" => $model_action] + $args)
            ->__invoke();
    }

    /**
     * @desc   根据当前的类,换成对应的网址路径
     *
     * @param array $args
     * @param null  $classname
     *
     * @return string
     */
    public static function urlencodeNoFollow($args = [], $classname = null)
    {
        return urlencode(self::urlNoFollow($args, $classname));
    }

    /**
     * @desc   网址跳转
     *
     * @param array $args
     * @param null  $classname
     */
    public static function gourl($args = [], $classname = null)
    {
        $url = self::url($args, $classname);
        (new FixUrl($url))
            ->setJump(true)
            ->__invoke();
    }

    /**
     * @desc   网址跳转
     *
     * @param array $args
     * @param null  $classname
     * @author 夏琳泰 mailto:xialt@citssh.com.cn
     *
     * @since  2015-08-17 08:38:05
     *
     */
    public static function gourlNoFollow($args = [], $classname = null)
    {
        $url = static::urlNoFollow($args, $classname);
        (new FixUrl($url))
            ->setJump(true)
            ->__invoke();
    }

    public static function goBack()
    {
        if ($_REQUEST['backurl']) {
            return (new FixUrl())
                ->setUrl(urldecode($_REQUEST['backurl']))
                ->setJump(true)
                ->__invoke();
        } else {
            return (new FixUrl($_SERVER['HTTP_REFERER']))
                ->setJump(true)
                ->__invoke();
        }
    }
}
