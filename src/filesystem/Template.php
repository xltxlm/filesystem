<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-11-27
 * Time: 下午 12:17
 */

namespace xltxlm\filesystem;

use Exception\FileNotExsistException;

/**
 * 文件模板基类
 * Class template
 * @package xltxlm\filesystem
 */
abstract class Template
{
    /** @var string 模板的文件路径 */
    protected $file = "";
    /** @var \stdClass 类的实例 */
    protected $class = "";
    /** @var string 保存的文件 */
    protected $save = "";

    /**
     * @param string $save
     * @return Template
     */
    final public function setSave($save)
    {
        $this->save = $save;
        return $this;
    }

    /**
     * @return \stdClass
     */
    public function getClass(): \stdClass
    {
        return $this->class;
    }

    /**
     * @param \stdClass $class
     * @return Template
     */
    public function setClass(\stdClass $class): Template
    {
        $this->class = $class;
        return $this;
    }

    /**
     * @return string
     */
    final public function getFile()
    {
        return $this->file;
    }

    /**
     * @param string $file
     * @return static
     * @throws FileNotExsistException
     */
    final public function setFile($file)
    {
        if (!is_file($file)) {
            throw new FileNotExsistException("文件不存在");
        }
        $this->file = $file;
        return $this;
    }

    /**
     * 运行模板，如果没有指定保存的文件，那么直接输出
     */
    final public function __invoke()
    {
        ob_start();
        eval("include ".$this->getFile().";");
        if ($this->save) {
            file_put_contents($this->save, ob_get_clean());
        } else {
            ob_end_flush();
        }
    }
}
