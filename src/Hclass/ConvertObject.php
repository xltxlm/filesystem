<?php
/**
 * Created by PhpStorm.
 * User: xialintai
 * Date: 2017/1/13
 * Time: 10:09.
 */

namespace xltxlm\helper\Hclass;

use xltxlm\helper\BasicType;

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
     *
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
            $this->toArray = $this->object2Array($this->getObject());
        }

        return $this->toArray;
    }

    /**
     * @param $object
     *
     * @return array
     */
    protected function object2Array($object): array
    {
        $data = [];
        $Properties = (new \ReflectionClass($object))->getProperties();
        /** @var  \ReflectionProperty $property */
        foreach ($Properties as $property) {
            $property->setAccessible(true);
            $value = $property->getValue($object);
            if (is_object($value)) {
                if ($value instanceof BasicType) {
                    $data[$property->getName()] = $value->getValue();
                } else {
                    $data[$property->getName()] = $this->object2Array($value);
                }
            } elseif (is_array($value)) {
                foreach ($value as $key => $item) {
                    if (is_object($item)) {
                        $data[$property->getName()][$key] = $this->object2Array($item);
                    } else {
                        $data[$property->getName()][$key] = $item;
                    }
                }
            } else {
                $data[$property->getName()] = $value;
            }
        }

        return $data;
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
