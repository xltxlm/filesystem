<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-08
 * Time: 上午 9:38
 */

namespace xltxlm\helper\tests\Resource\Ctroller;

use xltxlm\helper\Ctroller\Response\ResponseJson;

final class Demo
{
    protected $id;
    protected $name;
    /** @var  \xltxlm\helper\tests\Resource\Ctroller\SomeObject */
    protected $obect;

    use ResponseJson;

    /**
     * @return SomeObject
     */
    public function getObect(): SomeObject
    {
        return $this->obect;
    }

    /**
     * @param SomeObject $obect
     * @return Demo
     */
    public function setObect(SomeObject $obect): Demo
    {
        $this->obect = $obect;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Demo
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return Demo
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
}
