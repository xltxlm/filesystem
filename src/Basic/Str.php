<?php
namespace xltxlm\helper\Basic;

use xltxlm\helper\Hclass\LoadFromArray;
/**
 * 字符串常规操作集合;
*/
class Str{
    use LoadFromArray;



    /* @var string 需要处理的字符串 */
    protected $Value;

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
        获取指定索引位置的单词，从0开始数起    */
    public function AtIndex(int $Atindex = null):string    {
$this->Value = $this->Value[$Atindex];
        return $this->Value;
    }
    /**
     * @return $this
     */
    function AtIndex_this(int $Atindex = null) :Str    {
        $this->AtIndex($Atindex);
        return $this;
    }

    /**
        追加其他字符串    */
    public function Append(string $Addstring = null):string    {
$this->Value .= $Addstring;
return $this->Value;
    }
    /**
     * @return $this
     */
    function Append_this(string $Addstring = null) :Str    {
        $this->Append($Addstring);
        return $this;
    }

    /**
        根据给出的前后索引，截取字符串    */
    public function Substr(int $start = null,int $length = null):string    {
if ($length) {
            $this->Value = substr($this->Value, $start, $length);
        } else {
            $this->Value = substr($this->Value, $start);
        }
        return $this->Value;
    }
    /**
     * @return $this
     */
    function Substr_this(int $start = null,int $length = null) :Str    {
        $this->Substr($start,$length);
        return $this;
    }

    /**
        改成小写    */
    public function ToLowerCase():string    {
$this->Value = strtolower($this->Value);
return $this->Value;
    }
    /**
     * @return $this
     */
    function ToLowerCase_this() :Str    {
        $this->ToLowerCase();
        return $this;
    }

    /**
        转换成大写    */
    public function ToUpperCase():string    {
$this->Value = strtoupper($this->Value);
return $this->Value;
    }
    /**
     * @return $this
     */
    function ToUpperCase_this() :Str    {
        $this->ToUpperCase();
        return $this;
    }

    /**
        根据指定的字符串进行截取    */
    public function SplitBystr(string $delimiter = null,int $pos = null):string    {
        if($pos === null )
        {
          $pos  = -1;
        }
if($pos === null )
        {
          $pos  = -1;
        }
$newArray = explode($delimiter,$this->getValue());
        $value = array_slice($newArray, $pos, 1)[0];
        $this->setValue($value);
        return $value;
    }
    /**
     * @return $this
     */
    function SplitBystr_this(string $delimiter = null,int $pos = null) :Str    {
        $this->SplitBystr($delimiter,$pos);
        return $this;
    }

    /**
        根据指定的分隔符，截取字符串，返回数组    */
    public function Split(string $delimiter = null):Arr    {
$arr = explode($delimiter, $this->getValue());
        return (new Arr())->setDefaultArray($arr);
    }

    /**
        第一个字符大写    */
    public function Ucfirst():string    {
$var = ucfirst($this->getValue());
$this->setValue($var);
return $var;
    }
    /**
     * @return $this
     */
    function Ucfirst_this() :Str    {
        $this->Ucfirst();
        return $this;
    }

    /**
        对字符串进行替换    */
    public function Strtr(string $oldvar = null,string $newvar = null):string    {
$var =strtr($this->getValue(),[$oldvar=>$newvar]);
$this->setValue($var);
return $var;
    }
    /**
     * @return $this
     */
    function Strtr_this(string $oldvar = null,string $newvar = null) :Str    {
        $this->Strtr($oldvar,$newvar);
        return $this;
    }

    /**
        判断是否包含另外一个字符串    */
    public function Strpos(string $posstr = null):bool    {
return strpos($this->getValue(),$posstr)!==false;
    }

    /**
        返回当前字符串    */
    public function __invoke():string    {
return $this->Value;
    }

    /**
            */
    public function __toString()    {
return $this->getValue();
    }

}