<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-06
 * Time: 下午 3:12
 */

namespace xltxlm\helper\Hclass;

/**
 * 用于检测类的必填写属性是否漏写了
 * Class EmptyAttribute
 * @package xltxlm\helper\Hclass
 */
trait EmptyAttribute
{
    /**
     * 类的属性的名称列表
     * @param array $methods
     */
    private function notify(array $methods = [])
    {
        $i = 0;
        foreach ($methods as $method) {
            $i++;
            if (empty($method)) {
                throw new \Exception("类:".static::class."第 $i 个参数属性为空");
            }
        }
    }
}
