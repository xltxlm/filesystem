<?php
namespace xltxlm\helper\Basic;

/**
 * 字符串数组相关处理;
*/
abstract class Arr_implements
{



    /* @var array 原始的字符串数组 */
        protected $DefaultArray = '';
    
    /**
     * @return array;
     */
    public function getDefaultArray():array    {
        return $this->DefaultArray;
    }

    /**
     * @param array $DefaultArray;
     * @return $this
     */
    public function setDefaultArray( $DefaultArray)
    {
        $this->DefaultArray = $DefaultArray;
        return $this;
    }

    /**
     *   和另外一个数组比较，取出不同之处     *   @return :array;
    */
    abstract public function Diff(array $StrigArray = null):array;

    /**
     *   追加一个值     *   @return :array;
    */
    abstract public function Push(string $NewString = null):array;
    /**
     * @return $this
     */
    function Push_this(string $NewString = null) :Arr    {
        $this->Push($NewString);
        return $this;
    }

    /**
     *   循环里面的值,对于字符串类型,进行trim操作     *   @return :array;
    */
    public function MapTrim():array    {
foreach ($this->getDefaultArray() as $item) {
            if (is_string($item)) {
                trim($item);
            }
        }
        return $this->getDefaultArray();
    }
    /**
     * @return $this
     */
    function MapTrim_this() :Arr    {
        $this->MapTrim();
        return $this;
    }

    /**
     *   用指定的函数进行回调     *   @return :array;
    */
    public function MapFunction( $call_function = null):array    {
foreach ($this->getDefaultArray() as $key=>&$item) {
            call_user_func($call_function,$key,$item);
        }
        return $this->getDefaultArray();
    }
    /**
     * @return $this
     */
    function MapFunction_this( $call_function = null) :Arr    {
        $this->MapFunction($call_function);
        return $this;
    }

    /**
     *   取出第一个元素     *   @return :Str;
    */
    public function GetFirst():Str    {
return (new Str())->setValue(current($this->getDefaultArray()));
    }

    /**
     *   取出最后一个元素     *   @return :Str;
    */
    public function GetLast():Str    {
return (new Str())->setValue(end($this->getDefaultArray()));
    }

    /**
     *   弹出头部的元素     *   @return ;
    */
    public function Shift()    {
return array_shift($this->getDefaultArray());
    }

    /**
     *   输出json字符串     *   @return :string;
    */
    public function Tojson():string    {
return json_encode($this->getDefaultArray(),JSON_UNESCAPED_UNICODE)?:'[]';
    }

}