<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-11-27
 * Time: 下午 12:17
 */

namespace xltxlm\helper\filesystem;

use xltxlm\helper\Exception\FileNotExsistException;

/**
 * 文件模板基类
 * Class template
 * @package xltxlm\filesystem
 */
abstract class Template
{
    /** @var string 模板的文件路径 */
    protected $file = "";
    /** @var string 保存的文件 */
    protected $saveToFileName = "";

    /**
     * @param string $saveToFileName
     * @return static
     */
    final public function setSaveToFileName($saveToFileName): Template
    {
        $this->saveToFileName = $saveToFileName;
        return $this;
    }

    /**
     * @return string
     * @throws FileNotExsistException
     */
    public function getFile()
    {
        if (empty($this->file)) {
            $fileName = (new \ReflectionClass(static::class))->getFileName();
            $this->file = dirname($fileName) . DIRECTORY_SEPARATOR . basename($fileName, '.php') . '.tpl.php';
        }
        if (!is_file($this->file)) {
            throw new FileNotExsistException("文件不存在:" . $this->file);
        }
        return $this->file;
    }

    /**
     * @param string $file
     * @return static
     */
    public function setFile(string $file): Template
    {
        $this->file = $file;
        return $this;
    }


    /**
     * 运行模板，如果没有指定保存的文件，那么直接输出
     * @return string
     */
    final public function __invoke()
    {
        ob_start();
        eval("include '" . $this->getFile() . "';");
        if ($this->saveToFileName) {
            file_put_contents($this->saveToFileName, ob_get_clean());
        } else {
            return ob_get_clean();
        }
        return "";
    }
}
