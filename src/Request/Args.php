<?php

namespace xltxlm\helper\Request;


/**
 * 获取请求的参数，指定类型，指定默认值;
 */
class Args extends Args\Args_implements
{
    public function __invoke()
    {
        if (empty($this->getkey()) && strlen($this->getkey()) == 0) {
            throw new \Exception("没有指定要获取的索引名字。");
        }
        if (isset($this->getfromarray()[$this->getkey()])) {
            $v = $this->getfromarray()[$this->getkey()];
            //如果还需要进一步进行类型矫正
            if ($this->gettype()) {
                $v_type = gettype($v);
                //第一种情况，类型一致的，直接返回
                if ($v_type == $this->gettype()) {
                    return $v;
                }
                //类型不一致的，下面这3种可以换线转换
                if (in_array($v_type, [self::INTEGER, self::DOUBLE, self::STRING])) {
                    if ($this->gettype() == self::INTEGER) {
                        return intval($v);
                    }
                    if ($this->gettype() == self::DOUBLE) {
                        return doubleval($v);
                    }
                    if ($this->gettype() == self::STRING) {
                        return strval($v);
                    }
                }
                throw new \Exception("类型不一致，且无法转换。");
            } else {
                //没有类型比对的要求。直接返回值。 《------ 非常不严谨
                return $v;
            }
        } else {
            $d_type = gettype($this->getdefault());
            //有默认值的返回默认值
            if ($d_type != self::NULL) {
                //走到默认值这一步，但是也指定了类型，还要再校验下类型。
                if ($this->gettype()) {
                    //第一种情况，类型一致的，直接返回
                    if ($d_type == $this->gettype()) {
                        return $this->getdefault();
                    }
                    $basic_type = [self::INTEGER, self::DOUBLE, self::STRING];
                    if (in_array($d_type, $basic_type) && in_array($this->gettype(), $basic_type)) {
                        if ($this->gettype() == self::INTEGER) {
                            return intval($this->getdefault());
                        }
                        if ($this->gettype() == self::DOUBLE) {
                            return doubleval($this->getdefault());
                        }
                        if ($this->gettype() == self::STRING) {
                            return strval($this->getdefault());
                        }
                    }
                    throw new \Exception("数组中已经找不到了，但是指定了默认值，也指定了类型，坑爹的是2个不一致？{$d_type} vs {$this->getdefault()}");
                }
                return $this->getdefault();
            }
            //没有默认值的，但是指定了基础类型的，返回最基本的孔
            if ($this->gettype()) {
                //没有默认值的，且是基础类型的。返回"空"
                if (in_array($this->gettype(), [self::INTEGER, self::DOUBLE, self::STRING, self::BOOLEAN, self::NULL, self::ARRAY])) {
                    if ($this->gettype() == self::INTEGER) {
                        return 0;
                    }
                    if ($this->gettype() == self::DOUBLE) {
                        return 0;
                    }
                    if ($this->gettype() == self::STRING) {
                        return "";
                    }
                    if ($this->gettype() == self::BOOLEAN) {
                        return false;
                    }
                    if ($this->gettype() == self::NULL) {
                        return null;
                    }
                    if ($this->gettype() == self::ARRAY) {
                        return [];
                    }
                }
            }
            throw new \Exception("找不到变量索引：{$this->getkey()}，且没有默认值，又不是最基础的类型变量：{$this->gettype()}");
        }
    }


}