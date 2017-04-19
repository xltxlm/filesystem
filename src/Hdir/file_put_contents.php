<?php
/**
 * Created by PhpStorm.
 * User: xialintai
 * Date: 2017/4/19
 * Time: 10:42
 */

namespace xltxlm\helper\Hdir;

/**
 * 模板写入数据.确保生成的文件内容一致,会覆盖掉不一致的文件
 * Class file_put_contents
 * @package xltxlm\helper\Hdir
 */
trait file_put_contents
{
    /**
     * 要求模板没有引用局部变量
     * @param string $classRealFile
     * @param string $templatePath
     */
    protected function file_put_contents(string $classRealFile, string $templatePath)
    {
        ob_start();
        eval('include $templatePath;');
        $ob_get_clean = ob_get_clean();
        //1:先保证控制层的基准类一定存在
        if (!is_file($classRealFile) || file_get_contents($classRealFile) !== $ob_get_clean) {
            file_put_contents($classRealFile, $ob_get_clean);
        }
    }
}