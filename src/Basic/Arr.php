<?php
namespace xltxlm\helper\Basic;

use xltxlm\helper\Hclass\LoadFromArray;
/**
 * 字符串数组相关处理;
*/
class Arr{
    use LoadFromArray;



    /* @var array 原始的字符串数组 */
    protected $DefaultArray;

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
        和另外一个数组比较，取出不同之处    */
    public function Diff( $StrigArray = null)    {

    }

    /**
        追加一个值    */
    public function Push(string $NewString = null)    {

    }
    /**
     * @return $this
     */
    function Push_this(string $NewString = null) :Arr    {
        $this->Push($NewString);
        return $this;
    }

    /**
        循环里面的值,对于字符串类型,进行trim操作    */
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
        用指定的函数进行回调    */
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

}