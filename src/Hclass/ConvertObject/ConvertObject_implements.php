<?php
namespace xltxlm\helper\Hclass\ConvertObject;

/**
 * :类;
 * 把对象转换成数组或者json串。可以直接提取出私有变量，并且可以转换属性下面也是对象的。;
*/
abstract class ConvertObject_implements
{


/* @var void  对象，或者对象数组 */
        protected $object;





    /**
    * 对象，或者对象数组;
    * @return void;
    */
            public function getobject()        {
                return $this->object;
        }

    
    




/**
* @param  $object;
* @return $this
*/
    public function setobject( $object )
    {
    $this->object = $object;
    return $this;
    }



/* @var int  当提取对象属性的是，用到的反射过滤器。

ReflectionProperty::IS_STATIC
Indicates static properties.

ReflectionProperty::IS_PUBLIC
Indicates public properties.

ReflectionProperty::IS_PROTECTED
Indicates protected properties.

ReflectionProperty::IS_PRIVATE
Indicates private properties. */
    protected $filter = 0;
    




    /**
    * 当提取对象属性的是，用到的反射过滤器。

ReflectionProperty::IS_STATIC
Indicates static properties.

ReflectionProperty::IS_PUBLIC
Indicates public properties.

ReflectionProperty::IS_PROTECTED
Indicates protected properties.

ReflectionProperty::IS_PRIVATE
Indicates private properties.;
    * @return int;
    */
            public function getfilter():int        {
                return $this->filter;
        }

    
    




/**
* @param int $filter;
* @return $this
*/
    public function setfilter(int $filter  = 0)
    {
    $this->filter = $filter;
    return $this;
    }



/* @var array  转换成数组的结果数组 */
    protected $toArray = [];





    /**
    * 转换成数组的结果数组;
    * @return array;
    */
            public function gettoArray():array        {
                return $this->toArray;
        }

    
    




/**
* @param array $toArray;
* @return $this
*/
    public function settoArray(array $toArray  = [])
    {
    $this->toArray = $toArray;
    return $this;
    }



}