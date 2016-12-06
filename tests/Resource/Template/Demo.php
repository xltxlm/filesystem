<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-06
 * Time: 下午 7:48
 */

namespace xltxlm\helper\tests\Resource\Template;

use xltxlm\helper\filesystem\Template;

final class Demo extends Template
{
    protected $file = __DIR__.'/Demo.tpl.php';
    protected $id = 1;
    protected $name = "测试名称";

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Demo
     */
    public function setId(int $id): Demo
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
     * @return Demo
     */
    public function setName(string $name): Demo
    {
        $this->name = $name;
        return $this;
    }
}
