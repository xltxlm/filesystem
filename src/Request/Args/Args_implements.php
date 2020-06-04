<?php
namespace xltxlm\helper\Request\Args;

/**
 * :类;
 * 获取请求的参数，指定类型，指定默认值;
*/
abstract class Args_implements
{
    /* boolean */
    public const BOOLEAN="boolean";
    /* integer */
    public const INTEGER="integer";
    /* double */
    public const DOUBLE="double";
    /* string */
    public const STRING="string";
    /* array */
    public const ARRAY="array";
    /* object */
    public const OBJECT="object";
    /* resource */
    public const RESOURCE="resource";
    /* NULL */
    public const NULL="NULL";
    /* unknown type */
    public const UNKNOWN_TYPE="unknown type";


/* @var string  要获取的值的索引 */
    protected $key = '';





    /**
    * 要获取的值的索引;
    * @return string;
    */
            public function getkey():string        {
                return $this->key;
        }

    
    




/**
* @param string $key;
* @return $this
*/
    public function setkey(string $key  = "")
    {
    $this->key = $key;
    return $this;
    }



/* @var array  取值的源数组 */
    protected $fromarray = [];





    /**
    * 取值的源数组;
    * @return array;
    */
            public function getfromarray():array        {
                return $this->fromarray;
        }

    
    




/**
* @param array $fromarray;
* @return $this
*/
    public function setfromarray(array $fromarray  = [])
    {
    $this->fromarray = $fromarray;
    return $this;
    }



/* @var void  默认值 */
        protected $default;





    /**
    * 默认值;
    * @return void;
    */
            public function getdefault()        {
                return $this->default;
        }

    
    




/**
* @param  $default;
* @return $this
*/
    public function setdefault( $default )
    {
    $this->default = $default;
    return $this;
    }



/* @var string  锁定类型 */
    protected $type = '';





    /**
    * 锁定类型;
    * @return string;
    */
            public function gettype():string        {
                return $this->type;
        }

    
    




/**
* @param string $type;
* @return $this
*/
    public function settype(string $type  = "")
    {
    $this->type = $type;
    return $this;
    }



/**
*  输出结论;
*  @return ;
*/
abstract public function __invoke();
}