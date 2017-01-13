<?php
/**
 * Created by PhpStorm.
 * User: xialintai
 * Date: 2017/1/13
 * Time: 10:09.
 */

namespace xltxlm\helper\Hclass;

/**
 * 将对象转换成各种形式
 * Class Convert.
 */
class ConvertObject
{
    /** @var mixed */
    protected $object;
    /** @var array 转换结果的数组 */
    protected $toArray = [];

    /**
     * ConvertObject constructor.
     * @param mixed $object
     */
    public function __construct($object = null)
    {
        if (!empty($object)) {
            $this->setObject($object);
        }
    }


    /**
     * @return mixed
     */
    public function getObject()
    {
        return $this->object;
    }

    /**
     * @param mixed $object
     *
     * @return ConvertObject
     */
    public function setObject($object): ConvertObject
    {
        $this->object = $object;

        return $this;
    }

    /**
     * 转换成数组.
     *
     * @return array
     */
    public function toArray()
    {
        if (empty($this->toArray)) {
            $ReflectionClass = (new \ReflectionClass($this->getObject()));
            $Properties = $ReflectionClass->getProperties();
            /** @var \ReflectionProperty $property */
            foreach ($Properties as $property) {
                $property->setAccessible(true);
                $this->toArray[$property->getName()] = $property->getValue($this->getObject());
            }
        }

        return $this->toArray;
    }

    /**
     * 转换成json格式.
     *
     * @return string
     */
    public function toJson()
    {
        return json_encode($this->toArray(), JSON_UNESCAPED_UNICODE);
    }
}
