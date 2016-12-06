<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-06
 * Time: 下午 8:51
 */

namespace xltxlm\helper\tests\Resource\Template;

use xltxlm\helper\filesystem\Template;

/**
 * 不需要指定模板文件名字,指定在当前目录下加载同名文件
 * Class DemoAutoLoadTP
 * @package xltxlm\helper\Resource\Template
 */
class DemoAutoLoadTP extends Template
{
    protected $id = 0;
    protected $name = "";

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return DemoAutoLoadTP
     */
    public function setId(int $id): DemoAutoLoadTP
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return DemoAutoLoadTP
     */
    public function setName(string $name): DemoAutoLoadTP
    {
        $this->name = $name;
        return $this;
    }
}
