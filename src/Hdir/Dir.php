<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-04-09
 * Time: 下午 9:43
 */

namespace xltxlm\helper\Hdir;

/**
 * 递归一个文件夹
 * Class dir
 * @package xltxlm\helper\Hdir
 */
class Dir
{
    /** @var string 需要扫描的文件夹路径 */
    protected $dir = "";
    /** @var bool 是否只返回文件类型的 */
    protected $onlyFile = false;
    /** @var bool 只返回目录 */
    protected $onlyDir = false;
    /** @var string 只返回命中的匹配类型 */
    protected $preg = '';
    /** @var int 限制扫描的目录深度 */
    protected $depth = null;

    /**
     * Dir constructor.
     * @param string $dir
     */
    public function __construct(string $dir)
    {
        if ($dir) {
            $this->setDir($dir);
        }
    }

    /**
     * @return int
     */
    public function getDepth(): int
    {
        return $this->depth;
    }

    /**
     * @param int $depth
     * @return Dir
     */
    public function setDepth(int $depth): Dir
    {
        $this->depth = $depth;
        return $this;
    }


    /**
     * @return bool
     */
    public function isOnlyDir(): bool
    {
        return $this->onlyDir;
    }

    /**
     * @param bool $onlyDir
     * @return Dir
     */
    public function setOnlyDir(bool $onlyDir): Dir
    {
        $this->onlyDir = $onlyDir;
        return $this;
    }


    /**
     * @return string
     */
    public function getDir(): string
    {
        return $this->dir;
    }

    /**
     * @param string $dir
     * @return Dir
     */
    public function setDir(string $dir): Dir
    {
        $this->dir = realpath($dir);
        return $this;
    }

    /**
     * @return bool
     */
    public function isOnlyFile(): bool
    {
        return $this->onlyFile;
    }

    /**
     * @param bool $onlyFile
     * @return Dir
     */
    public function setOnlyFile(bool $onlyFile): Dir
    {
        $this->onlyFile = $onlyFile;
        return $this;
    }

    /**
     * @return string
     */
    public function getPreg(): string
    {
        return $this->preg;
    }

    /**
     * @param string $preg
     * @return Dir
     */
    public function setPreg(string $preg): Dir
    {
        $this->preg = $preg;
        return $this;
    }

    /**
     * @return \Generator
     */
    public function __invoke()
    {
        $Directory = new \RecursiveDirectoryIterator($this->dir);
        $Iterator = new \RecursiveIteratorIterator($Directory);
        /** @var \SplFileInfo $item */
        foreach ($Iterator as $item) {
            if ($this->getDepth() !== null && $Iterator->getDepth() != $this->getDepth()) {
                continue;
            }
            if ($item->isFile() && $this->isOnlyDir()) {
                continue;
            }
            if ($item->isDir() && $this->isOnlyFile()) {
                continue;
            }
            if ($this->getPreg()) {
                $match = preg_match('#' . $this->getPreg() . '#i', $item->getBasename());
                if (!$match) {
                    continue;
                }
            }
            yield $item;
        }
    }
}