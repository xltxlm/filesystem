<?php
/**
 * Created by PhpStorm.
 * User: xialintai
 * Date: 2017/4/14
 * Time: 17:44
 */

namespace xltxlm\helper\Hdir;

/**
 * 同步一个目录,并且可以模板化文件. [变量]
 * Class DirTemplate
 * @package xltxlm\helper\Hdir
 */
class DirTemplate
{
    use file_write_contents;
    /** @var array 替换的变量对 */
    protected $replace = [];

    /** @var string 来源目录 */
    protected $fromDir = "";
    /** @var string 目标目录 */
    protected $toDir = "";
    /** @var bool 是否强制覆盖掉原来的文件,默认不覆盖 */
    protected $overWrite = false;

    /**
     * @return bool
     */
    public function isOverWrite(): bool
    {
        return $this->overWrite;
    }

    /**
     * @param bool $overWrite
     * @return DirTemplate
     */
    public function setOverWrite(bool $overWrite): DirTemplate
    {
        $this->overWrite = $overWrite;
        return $this;
    }

    /**
     * @return string
     */
    public function getFromDir(): string
    {
        return $this->fromDir;
    }

    /**
     * @param string $fromDir
     * @return DirTemplate
     */
    public function setFromDir(string $fromDir): DirTemplate
    {
        $this->fromDir = realpath($fromDir);
        return $this;
    }

    /**
     * @return string
     */
    public function getToDir(): string
    {
        return $this->toDir;
    }

    /**
     * @param string $toDir
     * @return DirTemplate
     */
    public function setToDir(string $toDir): DirTemplate
    {
        $this->toDir = realpath($toDir);
        return $this;
    }


    /**
     * @return array
     */
    public function getReplace(): array
    {
        return $this->replace;
    }

    /**
     * @param string $replaceKey
     * @param string $replaceValue
     * @return DirTemplate
     */
    public function setReplace(string $replaceKey, string $replaceValue): DirTemplate
    {
        $this->replace["[$replaceKey]"] = $replaceValue;
        return $this;
    }

    public function __invoke()
    {
        if (!is_dir($this->getFromDir())) {
            return;
        }
        $dirs = (new Dir($this->getFromDir()))
            ->__invoke();
        foreach ($dirs as $dir) {
            $difPath = strtr($dir->getRealPath(), [$this->getFromDir() => '']);
            if ($dir->isDir()) {
                mkdir($this->getToDir().$difPath);
            } else {
                $this->file_write_contents($this->getToDir().$difPath, strtr(file_get_contents($dir->getRealPath()), $this->getReplace()), $this->isOverWrite());
            }
        }
    }


}