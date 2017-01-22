<?php
/**
 * Created by PhpStorm.
 * User: xialintai
 * Date: 2016/12/24
 * Time: 18:46.
 */

namespace xltxlm\helper\tests\Resource\Hclass;

use xltxlm\helper\Hclass\ObjectToArray;

class ObjectToArrayDemo
{
    use ObjectToArray;
    private $id = __LINE__;
    protected $name = __FILE__;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return ObjectToArrayDemo
     */
    public function setId(int $id): ObjectToArrayDemo
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
     *
     * @return ObjectToArrayDemo
     */
    public function setName(string $name): ObjectToArrayDemo
    {
        $this->name = $name;

        return $this;
    }
}
