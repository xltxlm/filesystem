<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-16
 * Time: 下午 12:33
 */

namespace xltxlm\helper\Hclass;

/**
 * 根据类名称,设置的路径深度,返回路径
 * Class FilePathFromCLass
 * @package xltxlm\helper\Hclass
 */
final class FilePathFromClass
{
    /** @var string 需要处理的类名称 */
    protected $className = "";
    /** @var int 根据设置目录层次深度,获取目录路径 */
    protected $dirPath = "";
    /** @var int 设置目录层次深度,获取目录路径 */
    protected $dirDepth = 1;

    /** @var  \ReflectionClass 处理的类的映射 */
    private $reflace;
    /** @var string 类所在的路径 */
    private $filePath = "";
    /** @var string 类的命名空间 */
    private $nameSpce = "";

    /**
     * FilePathFromCLass constructor.
     * @param string $className
     */
    public function __construct(string $className = "")
    {
        if ($className) {
            $this->setClassName($className);
        }
    }

    /**
     * @return string
     */
    public function getFilePath(): string
    {
        return $this->filePath = $this->reflace->getFileName();
    }

    /**
     * @return string
     */
    public function getNameSpce(): string
    {
        return $this->nameSpce = $this->reflace->getNamespaceName();
    }


    /**
     * @param string $className
     * @return FilePathFromClass
     */
    public function setClassName(string $className): FilePathFromClass
    {
        $this->className = $className;
        $this->reflace = (new \ReflectionClass($this->className));
        return $this;
    }

    /**
     * @return string
     */
    public function getDirPath(): string
    {
        $this->dirPath = $this->getFilePath();
        for ($i = 1; $i <= $this->dirDepth; $i++) {
            $this->dirPath = dirname($this->dirPath);
        }
        return $this->dirPath;
    }

    /**
     * @param int $dirDepth
     * @return FilePathFromClass
     */
    public function setDirDepth(int $dirDepth): FilePathFromClass
    {
        $this->dirDepth = $dirDepth;
        return $this;
    }
}
