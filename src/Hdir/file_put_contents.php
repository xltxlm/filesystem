<?php
/**
 * Created by PhpStorm.
 * User: xialintai
 * Date: 2017/4/19
 * Time: 10:42
 */

namespace xltxlm\helper\Hdir;

use xltxlm\fileinfo\Fileinfo;

/**
 * 模板写入数据.确保生成的文件内容一致,会覆盖掉不一致的文件
 * Class file_put_contents
 *
 * @package xltxlm\helper\Hdir
 */
trait file_put_contents
{
    /**
     * 要求模板没有引用局部变量
     * @param string $classRealFile
     * @param string $templatePath
     * @param bool $orverWrite 是否强制一致
     * @return bool
     */
    protected function file_put_contents(string $classRealFile, string $templatePath, bool $orverWrite = true, $args = [])
    {
        if ($args) {
            extract($args);
        }
        ob_start();
        eval('include $templatePath;');
        $ob_get_clean = ob_get_clean();
        //1:先保证控制层的基准类一定存在
        $file_get_contents = file_get_contents($classRealFile);
        if (!$file_get_contents || !is_file($classRealFile) || ($file_get_contents !== $ob_get_clean && $orverWrite)) {
            //确保文件以及,文件夹存在
            (new Fileinfo($classRealFile))
                ->Touch();
            file_put_contents($classRealFile, $ob_get_clean, LOCK_EX);
            return true;
        }
        return false;
    }
}