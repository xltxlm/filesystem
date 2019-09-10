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
    /** @var array 日期格式的，变成区间数组输出 */
    protected $datefield = [];
    /** @var array 枚举格式，字段强制变成数组类型 */
    protected $enumfield = [];

    /**
     * @return array
     */
    public function getEnumfield(): array
    {
        return $this->enumfield;
    }

    /**
     * @param array $enumfield
     * @return ConvertObject
     */
    public function setEnumfield(array $enumfield): ConvertObject
    {
        $this->enumfield = $enumfield;
        return $this;
    }


    /**
     * @return array
     */
    public function getDatefield(): array
    {
        return $this->datefield;
    }

    /**
     * @param array $datefield
     * @return ConvertObject
     */
    public function setDatefield(array $datefield): ConvertObject
    {
        $this->datefield = $datefield;
        return $this;
    }


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
            if (is_array($this->getObject())) {
                foreach ($this->getObject() as $item) {
                    $this->toArray[] = $this->object2Array($item);
                }
            } else {
                $this->toArray = $this->object2Array($this->getObject());
            }
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
        /** @var \ReflectionProperty $property */
        foreach ($Properties as $property) {
            //如果字段名字是 encode,那么意味着内容是 aes加密的,不可以json化.
            if($property->getName() =='encode')
            {
                continue;
            }
            $property->setAccessible(true);
            $value = $property->getValue($object);
            if ($value instanceof BasicType) {
                $value = $value->getValue();
            }

            if (is_object($value)) {
                $data[$property->getName()] = $this->object2Array($value);
            } elseif (is_array($value)) {
                foreach ($value as $key => $item) {
                    if (is_object($item)) {
                        $data[$property->getName()][$key] = $this->object2Array($item);
                    } else {
                        //json格式化输出的数组,索引一般是连续的,不能自己制定id作为索引
                        if (is_numeric($key)) {
                            $data[$property->getName()][] = $item;
                        } elseif ($item == '0000-00-00' || $item == '0000-00-00 00:00:00') {
                            //时间格式处理掉
                            $data[$property->getName()][$key] = null;
                        } else {
                            $data[$property->getName()][$key] = $item;
                        }
                    }
                }
                if (empty($value)) {
                    $data[$property->getName()] = [];
                }
            } elseif ((is_numeric($value) && strlen($value) < 10) || is_bool($value)) {
                $data[$property->getName()] = $value;
            } elseif (is_numeric($value) && strlen($value) >= 10) {
                $data[$property->getName()] = strval($value);
            } else {
                if ($value == '0000-00-00 00:00:00' || $value == '0000-00-00') {
                    //时间格式处理掉
                    $data[$property->getName()] = null;
                } elseif (in_array($property->getName(), $this->getDatefield())) {
                    if ($value == 'current_date' ||
                        $value == 'yesterday' ||
                        $value == 'next_date') {
                        $data[$property->getName()] = $value;
                    } else {
                        if (is_string($data[$property->getName()])) {
                            $data[$property->getName()] = array_diff(explode(" - ", $value), [null, '']);
                        } elseif (empty($data[$property->getName()])) {
                            $data[$property->getName()] = [];
                        }
                    }
                } else {
                    $data[$property->getName()] = $value;
                }
            }

            //纠正枚举数据的类型
            if (in_array($property->getName(), $this->getEnumfield())) {
                if (empty($data[$property->getName()])) {
                    $data[$property->getName()] = [];
                }
                if (is_string($data[$property->getName()])) {
                    $data[$property->getName()] = [$data[$property->getName()]];
                }
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

    public function toMd5(): string
    {
        return md5($this->toJson());
    }

}
