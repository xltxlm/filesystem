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
     * @param mixed $value
     */
    public function __construct($value = null)
    {
        if (is_array($value) || $value || strlen($value) > 0) {
            $this->setValue($value);
        }
    }


    /**
     * @return string|mixed
     */
    public function getValue()
    {
        if ('currentMonth' === $this->value) {
            $this->value = date('Y-m');
        }
        return $this->value;
    }

    /**
     * @param mixed $value
     * @return $this
     */
    public function setValue($value)
    {
        if (get_class($value) == self::class) {
            $this->value = $value->getValue();
        } else {
            $this->value = $value;
        }
        return $this;
    }

    /**
     * 取出最后一段字符串
     */
    public function pop($glue, $times = 1)
    {
        $newArray = explode($glue, $this->getValue());
        $last = "";
        for ($i = 0; $i < $times; $i++) {
            $last = array_pop($newArray);
        }
        $object = clone $this;
        $object->setValue($last);
        return $object;
    }

    /**
     * 取出最前面一段字符串
     */
    public function shift($glue, $times = 1)
    {
        $newArray = explode($glue, $this->getValue());
        $last = "";
        for ($i = 0; $i < $times; $i++) {
            $last = array_shift($newArray);
        }
        $object = clone $this;
        $object->setValue($last);
        return $object;
    }

    /**
     * 根据分割的字符串,砍掉默认最后1个切割段
     * @param $glue
     * @param int $times
     * @return BasicType
     */
    public function popby($glue, $times = 1)
    {
        $newArray = explode($glue, $this->getValue());
        for ($i = 0; $i < $times; $i++) {
            array_pop($newArray);
        }
        $object = clone $this;
        $object->setValue(join($glue, $newArray));
        return $object;
    }

    /**
     * 输出百分比符号
     * @return $this
     */
    public function setPercentage()
    {
        $object = clone $this;
        $object->setValue($this->getValue() . '%');
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
        if (is_array($this->getValue())) {
            return json_encode($this->getValue(), JSON_UNESCAPED_UNICODE);
        }
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
            $object->setValue("<font color='blue' style='font-weight: bold'>" . $this->getValue() . "</font>");
        }
        if ($this->getValue() < -10) {
            $object->setValue("<font color='red' style='font-weight: bold'>" . $this->getValue() . "</font>");
        }
        return $object;
    }

    /**
     * 格式化成完整的日期区间
     */
    public function formatFullIndate()
    {
        $object = clone $this;
        if (is_array($this->getValue())) {
            $value = array_diff($this->getValue(), [null, '']);
            if (empty($value)) {
                $object->setValue("");
            } else {
                $object->setValue(strtr(join(' - ', $value), [' - ' => ' 00:00:00 - ']) . ' 23:59:59');
            }
        } elseif ($this->getValue()) {
            if ($this->getValue() == 'current_date') {
                $object->setValue(date('Ymd') . ' - ' . date('Ymd', strtotime("+1 day")));
            } elseif ($this->getValue() == 'yesterday') {
                $object->setValue(date('Ymd', strtotime("-1 day")) . ' - ' . date('Ymd'));
            } elseif ($this->getValue() == 'next_date') {
                $object->setValue(strtr(date('Ymd  -  Ymd ', strtotime("+1 day")), [' - ' => '00:00:00 - ']) . '23:59:59');
            } else {
                $object->setValue(strtr($this->getValue(), [' - ' => '00:00:00 - ']) . '23:59:59');
            }
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

    /**
     * 生成指定长度的随机字符串
     * @param int $param
     * @return $this
     */
    public function getRandomchar(int $param)
    {
        $str = "23456789abcdefghjkmnopqrstuvwxyz";
        $key = "";
        for ($i = 0; $i < $param; $i++) {
            $key .= $str{mt_rand(0, 32)};    //生成php随机数
        }
        $object = clone $this;
        $object->setValue($key);
        return $object;
    }

    public function strtolow()
    {
        return strtolower($this->getValue());
    }

    public function ucfirst()
    {
        return ucfirst($this->getValue());
    }

    /**
     * 明文展示时间间距
     * @param $ptime
     * @return $this
     */
    function timeAgo()
    {
        $lang["second"] = "秒";
        $lang["minute"] = "分钟";
        $lang["hour"] = "小时";
        $lang["month"] = "月";
        $lang["year"] = "年";
        $lang["day"] = "天";

        $object = clone $this;
        $etime = time() - strtotime($this->getValue());
        if ($etime < 1) {
            return $object->setValue('现在');
        }

        $a = array(365 * 24 * 60 * 60 => $lang['year'],
            30 * 24 * 60 * 60 => $lang['month'],
            24 * 60 * 60 => $lang['day'],
            60 * 60 => $lang['hour'],
            60 => $lang['minute'],
            1 => $lang['second']
        );

        foreach ($a as $secs => $str) {
            $d = $etime / $secs;
            if ($d >= 1) {
                $r = round($d);
                $key = $r . ' ' . $str . '前';
                $object->setValue($key);
                break;
            }
        }
        return $object;
    }
}
