<?php
/**
 * Created by PhpStorm.
 * User: xialintai
 * Date: 2017/8/25
 * Time: 10:55
 */

namespace xltxlm\helper\Ctroller;

/**
 * 解析命令行下面的参数
 * Class ArgofCmd
 * @package kuaigeng\sso\vendor\xltxlm\helper\src\Ctroller
 */
class ArgofCmd
{
    public function __invoke()
    {
        //DOS方式下的运行
        if (php_sapi_name() == 'cli') {
            unset($_SERVER['argv'][0]);
            foreach ($_SERVER['argv'] as $k1 => $v1) {
                $str_array = [];
                parse_str(
                    $v1,
                    $str_array
                );
                if (count($str_array) > 1) {
                    $key = key($str_array);
                    $current = current($str_array);
                    array_shift($str_array);
                    $str_array[$key] = $current . "&" . http_build_query($str_array);
                    $_GET = $str_array + $_GET;
                    unset($str_array);
                } else {
                    $_GET = $str_array + $_GET;
                }
            }
            $_REQUEST = $_GET;
        }
    }
}