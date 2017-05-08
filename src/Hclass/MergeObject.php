<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-01-22
 * Time: 下午 11:21.
 */

namespace xltxlm\helper\Hclass;

use ReflectionProperty;

/**
 * 合并对象，给定一个对象，再给定一个数组或者对象，然后把数组或者对象的值拷贝给原来的对象
 * 如果有值,覆盖原来的值,后来的覆盖前面的
 * Class MergeObject.
 */
class MergeObject
{
    /** @var mixed 原先的对象 */
    protected $object;
    /** @var mixed 附加的对象 */
    protected $mergeObject;
    /** @var array 附加的数组 */
    protected $array = [];
    /** @var bool 覆盖上了的值,就算是空也盖上去 */
    protected $emptyCover = true;

    /**
     * @return bool
     */
    public function isEmptyCover(): bool
    {
        return $this->emptyCover;
    }

    /**
     * @param bool $emptyCover
     * @return MergeObject
     */
    public function setEmptyCover(bool $emptyCover): MergeObject
    {
        $this->emptyCover = $emptyCover;
        return $this;
    }


    /**
     * MergeObject constructor.
     *
     * @param mixed $object
     */
    public function __construct($object = null)
    {
        if (is_object($object)) {
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
     * @return MergeObject
     * @throws \Exception
     */
    public function setObject($object)
    {
        if (!is_object($object)) {
            throw new \Exception('不是对象格式');
        }
        $this->object = $object;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getMergeObject()
    {
        return $this->mergeObject;
    }

    /**
     * @param mixed $mergeObject
     *
     * @return MergeObject
     */
    public function setMergeObject($mergeObject)
    {
        $this->mergeObject = $mergeObject;
        $this->setArray((new ConvertObject($mergeObject))
            ->toArray());
        return $this;
    }

    /**
     * @return array
     */
    public function getArray(): array
    {
        return $this->array;
    }

    /**
     * 可以添加多个要附加的内容
     * @param array $array
     *
     * @return MergeObject
     */
    public function setArray(array $array): MergeObject
    {
        $this->array[] = $array;

        return $this;
    }

    /**
     * @return mixed
     */
    public function __invoke()
    {
        //1:解出原先对象的全部属性
        $ReflectionClass = (new \ReflectionClass($this->getObject()));
        /** @var ReflectionProperty[] $ReflectionProperty */
        $ReflectionProperty = $ReflectionClass->getProperties();
        foreach ($ReflectionProperty as $item) {
            $item->setAccessible(true);
            foreach ($this->getArray() as $item1) {
                //如果有值,覆盖上去
                $var = $item1[$item->getName()];
                if ($var !== null) {
                    if (!$this->isEmptyCover() && strlen($var)<1) {
                        //不鸟,跳过
                        continue;
                    }
                    $item->setValue($this->getObject(), $var);
                }

            }
        }
        return $this->getObject();
    }
}
