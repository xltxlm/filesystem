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
    protected $id;
    protected $name;

    /**
     * @return mixed
     */
    public function &getId()
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
