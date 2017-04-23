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
trait file_write_contents
{
    /**
     * @param string $classRealFile
     * @param string $ob_get_clean
     * @return bool
     */
    protected function file_write_contents(string $classRealFile, string $ob_get_clean,bool $orverWrite = true):bool
    {
        //1:先保证控制层的基准类一定存在
        $file_get_contents = file_get_contents($classRealFile);
        if (!$file_get_contents || !is_file($classRealFile) || (($file_get_contents != $ob_get_clean) && $orverWrite)) {
            file_put_contents($classRealFile, $ob_get_clean);
            return true;
        }
        return false;
    }
}