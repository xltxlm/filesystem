<?php
/**
 * Created by PhpStorm.
 * User: xlt
 * Date: 2016/3/27
 * Time: 22:11.
 */

namespace xltxlm\helper\Ctroller;

/**
 * out:异常的处理方式，不中断代码，仓储起来。先进后出队列
 * Class htmlException.
 */
final class HtmlException
{
    private static $errori = 0;
    /** @var array */
    private static $Exception = [];

    /**
     * @return int
     */
    public static function getErrori()
    {
        return self::$errori;
    }

    /**
     * 记录一条错误信息.
     *
     * @param \Throwable $e
     */
    public static function push(\Throwable $e)
    {
        if (is_a($e, \Throwable::class)) {
            ++self::$errori;
            self::$Exception[] = $e;
        }
    }

    /**
     * 取出最后错误的信息.
     *
     * @return string
     */
    public static function pop()
    {
        if (self::$errori) {
            $Exception = self::popErrorObject();

            return $Exception->getMessage();
        }

        return '';
    }

    /**
     * 取出最后错误的Exception对象
     *
     * @return \Exception|null
     */
    public static function popErrorObject()
    {
        if (self::$errori) {
            --self::$errori;

            /* @var \Exception $Exception */
            return array_pop(self::$Exception);
        }

        return null;
    }
}
