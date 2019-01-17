<?php
namespace xltxlm\helper\Str;

/**
 * 转换成拼音;
*/
abstract class Str_To_Pinyin_implements
{



    /* @var string  */
        protected $Value = '';
    
    /**
     * @return string;
     */
    public function getValue():string    {
        return $this->Value;
    }

    /**
     * @param string $Value;
     * @return $this
     */
    public function setValue(string $Value)
    {
        $this->Value = $Value;
        return $this;
    }

    /**
     *        *   @return :string;
    */
    abstract public function __invoke():string;

}