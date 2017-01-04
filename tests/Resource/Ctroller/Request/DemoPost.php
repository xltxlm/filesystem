<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-08
 * Time: 下午 8:35.
 */

namespace xltxlm\helper\tests\Resource\Ctroller\Request;

use xltxlm\helper\Ctroller\Request\Post;

class DemoPost
{
    use Post;
    protected $id = '';
    protected $name;

    /**
     * @param string $id
     *
     * @return DemoPost
     */
    public function setId(string $id): DemoPost
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @param mixed $name
     *
     * @return DemoPost
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return mixed
     */
    public function &getId(): string
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function &getName()
    {
        return $this->name;
    }
}
