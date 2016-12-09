<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-08
 * Time: 下午 8:27
 */

namespace xltxlm\helper\tests\Resource\Ctroller\Request;

use xltxlm\helper\Ctroller\Request\Get;

class DemoGet
{
    use Get;

    protected $id;
    protected $name;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }
}
