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
    /** @var array 替换的变量对 */
    protected $replace = [];

    /** @var string 来源目录 */
    protected $fromDir = "";
    /** @var string 目标目录 */
    protected $toDir = "";

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
        $dirs = (new Dir($this->getFromDir()))
            ->__invoke();
        foreach ($dirs as $dir) {
            $difPath = strtr($dir->getRealPath(), [$this->getFromDir() => '']);
            if ($dir->isDir()) {
                mkdir($this->getToDir().$difPath);
            } else {
                $this->file_put_contents($this->getToDir().$difPath, $dir->getRealPath());
            }
        }
    }

    protected function file_put_contents(string $file, string $fromFile)
    {
        if (!is_file($file)) {
            $newData = strtr(file_get_contents($fromFile), $this->getReplace());
            file_put_contents($file, $newData);
        }
    }

}