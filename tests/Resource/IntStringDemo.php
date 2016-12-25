<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-25
 * Time: 下午 6:12.
 */

namespace xltxlm\helper\tests\Resource;

class IntStringDemo
{
    protected $intName = 0;
    protected $name = '';

    /**
     * @return int
     */
    public function getIntName(): int
    {
        return $this->intName;
    }

    /**
     * @param int $intName
     *
     * @return IntStringDemo
     */
    public function setIntName(int $intName): IntStringDemo
    {
        $this->intName = $intName;

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
     *
     * @return IntStringDemo
     */
    public function setName(string $name): IntStringDemo
    {
        $this->name = $name;

        return $this;
    }
}
