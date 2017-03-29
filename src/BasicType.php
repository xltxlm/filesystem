<?php

namespace xltxlm\helper;

use JsonSerializable;

/**
 * 基础对象的类,完成字符串最基本的输出配置
 * Class basicType
 * @package xltxlm\helper
 */
class BasicType implements JsonSerializable
{
    /** @var string 原始的内容 */
    protected $value = "";
    /** @var int 小数点后面保留的位数 */
    private $Decimalpoint = 0;

    /**
     * 重写json序列号输出格式
     * @return string
     */
    final public function jsonSerialize()
    {
        return $this->__toString();
    }


    /**
     * a constructor.
     * @param string $value
     */
    public function __construct(string $value = null)
    {
        if ($value) {
            $this->setValue($value);
        }
    }


    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     */
    public function setValue(string $value)
    {
        $this->value = $value;
    }

    /**
     * 输出百分比符号
     * @return $this
     */
    public function setPercentage()
    {
        $object = clone $this;
        $object->setValue($this->getValue().'%');
        return $object;
    }


    /**
     * 千分符分隔线
     * @param int $point
     * @return $this
     */
    public function setThousandMark()
    {
        $object = clone $this;
        $object->setValue(number_format($this->getValue(), $this->getDecimalpoint()));
        return $object;
    }

    /**
     * 小数点后保留位数
     */
    public function setDecimalpoint($Decimalpoint = 0)
    {
        $object = clone $this;
        $this->Decimalpoint = $Decimalpoint;
        $object->setValue(sprintf("%{$Decimalpoint}.f", $this->getValue()));
        return $object;
    }

    /**
     * @return int
     */
    public function getDecimalpoint(): int
    {
        return $this->Decimalpoint;
    }


    /**
     * 输出
     * @return string|null
     */
    public function __toString()
    {
        return $this->getValue();
    }

    public function __invoke()
    {
        return $this->__toString();
    }

    /**
     * @param $from
     * @param null $length
     * @return $this
     */
    public function substr($from, $length = null)
    {
        if ($length === null) {
            $length = strlen($this->getValue());
        }
        $object = clone $this;
        $object->setValue(substr($this->getValue(), $from, $length));
        return $object;
    }

    /**
     * 按照百分比,进行提示
     */
    public function formatAlert()
    {
        $object = clone $this;
        if ($this->getValue() > 10) {
            $object->setValue("<font color='blue' style='font-weight: bold'>".$this->getValue()."</font>");
        }
        if ($this->getValue() < -10) {
            $object->setValue("<font color='red' style='font-weight: bold'>".$this->getValue()."</font>");
        }
        return $object;
    }

    /**
     * 格式化成完整的日期区间
     */
    public function formatFullIndate()
    {
        $object = clone $this;
        if ($this->getValue()) {
            $object->setValue(strtr($this->getValue(), [' - ' => '000000 - ']).'235959');
        }
        return $object;
    }

    /**
     * 测试是否是一个邮箱地址
     * @return $this
     */
    public function isEmail()
    {
        $object = clone $this;
        $object->setValue(filter_var($this->getValue(), FILTER_VALIDATE_EMAIL) ? true : false);
        return $object;
    }
}
