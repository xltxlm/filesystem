<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-11-27
 * Time: 上午 11:50
 */

namespace xltxlm\filesystem;

/**
 * 文件，文件夹操作系统
 * Class filesystem
 * @package xltxlm
 */
class file
{
    private $realPath = "";
    private $dirname = "";
    private $basename = "";
    private $basenameNOSuffix = "";

    /** @var string 模板文件的路径 */
    protected $templateFile = "";

    /**
     * @return string
     */
    public function getTemplateFile()
    {
        return $this->templateFile;
    }

    /**
     * @param string $templateFile
     * @return file
     */
    public function setTemplateFile($templateFile)
    {
        $this->templateFile = $templateFile;
        return $this;
    }


    /**
     * @return string
     */
    public function getDirname()
    {
        return $this->dirname;
    }

    /**
     * @param string $dirname
     * @return file
     */
    private function setDirname($dirname)
    {
        $this->dirname = $dirname;
        return $this;
    }

    /**
     * 文件名
     * @return string
     */
    public function getBasename()
    {
        return $this->basename;
    }

    /**
     * @param string $basename
     * @return file
     */
    private function setBasename($basename)
    {
        $this->basename = $basename;
        return $this;
    }

    /**
     * 文件名称 - 没有后缀的
     * @return string
     */
    public function getBasenameNOSuffix()
    {
        return $this->basenameNOSuffix;
    }

    /**
     * @param string $basenameNOSuffix
     * @return file
     */
    private function setBasenameNOSuffix($basenameNOSuffix)
    {
        $this->basenameNOSuffix = $basenameNOSuffix;
        return $this;
    }


    /**
     * @param string $realPath
     * @return file
     */
    private function setRealPath($realPath)
    {
        $this->realPath = $realPath;
        return $this;
    }

    /**
     * @return string
     */
    public function getRealPath()
    {
        return $this->realPath;
    }


    public function get()
    {
    }

    public function setContent()
    {
    }

    /**
     * 设置文件权限
     */
    public function setUmask()
    {
    }

    /**
     * 拷贝到对应文件夹
     */
    public function setCopyToDir()
    {
    }

    /**
     * 覆盖对应文件
     */
    public function setCopyToFile()
    {
    }

    /**
     * ob_* 写入模板文件
     * @return $this
     */
    public function setTemplate()
    {
        ob_start();
        eval("include " . $this->getTemplateFile() . ";");
        file_put_contents($this->getRealPath(), ob_get_clean());
        return $this;
    }

    /**
     * 文件最新修改的时间
     * @return int
     */
    public function getChangeTime()
    {
        return filectime($this->getRealPath());
    }
}
