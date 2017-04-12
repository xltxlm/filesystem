<?php
/**
 * Created by PhpStorm.
 * User: xialintai
 * Date: 2017/4/12
 * Time: 13:38
 */

namespace xltxlm\helper\Hdir;


class RecursiveDirectoryIterator extends \RecursiveDirectoryIterator
{
    /** @var array 排除掉的文件名-完全匹配,不区分大小写 */
    protected $excludeDir = [];

    /**
     * @return array
     */
    public function getExcludeDir(): array
    {
        return $this->excludeDir;
    }

    /**
     * @param array $excludeDir
     * @return RecursiveDirectoryIterator
     */
    public function setExcludeDir(array $excludeDir): RecursiveDirectoryIterator
    {
        $this->excludeDir = $excludeDir;
        return $this;
    }


    public function hasChildren($allow_links = null)
    {
        $this->setExcludeDir(array_map('strtolower',$this->getExcludeDir()));
        if (in_array(strtolower(basename($this->key())), $this->getExcludeDir())) {
            return false;
        }
        return parent::hasChildren($allow_links);
    }

}