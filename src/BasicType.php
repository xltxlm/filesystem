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
    public function __construct($value = null)
    {
        $this->setValue($value);
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
        $this->setValue($this->getValue().'%');
        return $this;
    }


    /**
     * 千分符分隔线
     * @param int $point
     * @return $this
     */
    public function setThousandMark()
    {
        $this->setValue(number_format($this->getValue(), $this->getDecimalpoint()));
        return $this;
    }

    /**
     * 小数点后保留位数
     */
    public function setDecimalpoint($Decimalpoint = 0)
    {
        $this->Decimalpoint = $Decimalpoint;
        $this->setValue(sprintf("%{$Decimalpoint}.f", $this->getValue()));
        return $this;
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
     * @return string
     */
    public function __toString(): string
    {
        return (string)$this->getValue();
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
        $this->setValue(substr($this->getValue(), $from, $length));
        return $this;
    }

    /**
     * 测试是否是一个邮箱地址
     * @return $this
     */
    public function isEmail()
    {
        $this->setValue(filter_var($this->getValue(), FILTER_VALIDATE_EMAIL) ? true : false);
        return $this;
    }
}
