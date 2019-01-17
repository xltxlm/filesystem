<?php
namespace xltxlm\helper\Str;

use xltxlm\helper\Hclass\LoadFromArray;
use xltxlm\helper\Basic\Str;
/**
 * 判断一个字符串是否本身的json序列格式;
*/
class Str_isJson{
    use LoadFromArray;



    /* @var string  */
    protected $value;

    /**
     * @return string;
     */
    public function getvalue():string    {
        return $this->value;
    }

    /**
     * @param string $value;
     * @return $this
     */
    public function setvalue(string $value)
    {
        $this->value = $value;
        return $this;
    }

    /**
            */
    public function __invoke():bool    {
$first = (new Str())
                ->setValue($this->getvalue())
                ->Substr(0, 1) == '[';
        $last = (new Str())
                ->setValue($this->getvalue())
                ->Substr(-1, 1) == ']';
        
        if($first && $last)
        {
            return !empty(json_decode($this->getvalue(),true));
        }
        return false;
    }

}