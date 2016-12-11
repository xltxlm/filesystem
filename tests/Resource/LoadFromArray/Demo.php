<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-06
 * Time: 下午 9:33
 */

namespace xltxlm\helper\tests\Resource\LoadFromArray;

use xltxlm\helper\Hclass\LoadFromArray;

final class Demo
{
    use LoadFromArray;
    protected $name;
    private $id;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
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

    /**
     * @param mixed $id
     * @return Demo
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
}
