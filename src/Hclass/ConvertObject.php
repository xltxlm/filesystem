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
            $Properties = (new \ReflectionClass($this->getObject()))->getProperties();
            /** @var \ReflectionProperty $property */
            foreach ($Properties as $property) {
                $property->setAccessible(true);
                $value = $property->getValue($this->getObject());
                //支持再下一层的对象
                if (is_object($value)) {
                    /** @var \ReflectionProperty $property2 */
                    $Properties2 = (new \ReflectionClass($value))->getProperties();
                    foreach ($Properties2 as $property2) {
                        $property2->setAccessible(true);
                        $this->toArray[$property->getName()][$property2->getName()] = $property2->getValue($value);
                    }
                } else {
                    $this->toArray[$property->getName()] = $value;
                }
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
