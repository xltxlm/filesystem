<?php
/**
 * Created by PhpStorm.
 * User: xialintai
 * Date: 2017/4/25
 * Time: 13:11
 */

namespace xltxlm\helper\Ctroller;

/**
 * 编辑内容时候的注入操作
 * Interface EditAjax
 * @package xltxlm\helper\Ctroller
 */
interface EditAjax
{
    /**  */
    public function before();
    public function after();
}