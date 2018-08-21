<?php
namespace xltxlm\helper\Basic;

use xltxlm\helper\Hclass\LoadFromArray;
/**
 * 根据给定的网址,处理请求参数;
*/
class Url{
    use LoadFromArray;



    /* @var string 需要处理的网址 */
    protected $Url;

    /**
     * @return string;
     */
    public function getUrl():string    {
        return $this->Url;
    }

    /**
     * @param string $Url;
     * @return $this
     */
    public function setUrl(string $Url)
    {
        $this->Url = $Url;
        return $this;
    }

    /* @var string 协议 */
    protected $Scheme;

    /**
     * @return string;
     */
    public function getScheme():string    {
        return $this->Scheme;
    }

    /**
     * @param string $Scheme;
     * @return $this
     */
    public function setScheme(string $Scheme)
    {
        $this->Scheme = $Scheme;
        return $this;
    }

    /* @var string  */
    protected $Host;

    /**
     * @return string;
     */
    public function getHost():string    {
        return $this->Host;
    }

    /**
     * @param string $Host;
     * @return $this
     */
    public function setHost(string $Host)
    {
        $this->Host = $Host;
        return $this;
    }

    /* @var int  */
        protected $Port = 0;
    
    /**
     * @return int;
     */
    public function getPort():int    {
        return $this->Port;
    }

    /**
     * @param int $Port;
     * @return $this
     */
    public function setPort(int $Port)
    {
        $this->Port = $Port;
        return $this;
    }

    /* @var string  */
    protected $Path;

    /**
     * @return string;
     */
    public function getPath():string    {
        return $this->Path;
    }

    /**
     * @param string $Path;
     * @return $this
     */
    public function setPath(string $Path)
    {
        $this->Path = $Path;
        return $this;
    }

    /* @var array  */
    protected $Parameter;

    /**
     * @return array;
     */
    public function getParameter():array    {
        return $this->Parameter;
    }

    /**
     * @param array $Parameter;
     * @return $this
     */
    public function setParameter(array $Parameter)
    {
        $this->Parameter = $Parameter;
        return $this;
    }

    /* @var string  */
    protected $Query;

    /**
     * @return string;
     */
    public function getQuery():string    {
        return $this->Query;
    }

    /**
     * @param string $Query;
     * @return $this
     */
    public function setQuery(string $Query)
    {
        $this->Query = $Query;
        return $this;
    }

    /* @var bool 第一个初始化解析 */
        protected $Haveruned = false;
    
    /**
     * @return bool;
     */
    public function getHaveruned():bool    {
        return $this->Haveruned;
    }

    /**
     * @param bool $Haveruned;
     * @return $this
     */
    public function setHaveruned(bool $Haveruned)
    {
        $this->Haveruned = $Haveruned;
        return $this;
    }

    /**
        根据参数名称,返回参数的值    */
    public function GetParameterByName(string $name = null):string    {
$this->init();
       return $this->getparameter()[$name];
    }

    /**
        根据参数名字设置值    */
    public function SetParameterByName(string $name = null, $value = null)    {
$this->init();
$this->Parameter[$name] = $value;
$this->fixquery();
    }
    /**
     * @return $this
     */
    function SetParameterByName_this(string $name = null, $value = null) :Url    {
        $this->SetParameterByName($name,$value);
        return $this;
    }

    /**
        设置数组类型的参数    */
    public function SetArrayParameterByName(string $name = null,string $value = null)    {
$this->init();
        $this->Parameter[$name][] = $value;
        $this->fixquery();
    }
    /**
     * @return $this
     */
    function SetArrayParameterByName_this(string $name = null,string $value = null) :Url    {
        $this->SetArrayParameterByName($name,$value);
        return $this;
    }

    /**
        取消指定请求名    */
    public function UnSetParameterByName(string $name = null)    {
$this->init();
unset($this->Parameter[$name]);
$this->fixquery();
    }
    /**
     * @return $this
     */
    function UnSetParameterByName_this(string $name = null) :Url    {
        $this->UnSetParameterByName($name);
        return $this;
    }

    /**
        初始化解析网址    */
    public function init()    {
if ($this->Haveruned) {
            //已经解析过了,不需要再解析
        } else {
            $parse_url = parse_url($this->getUrl());
            $this->sethost($parse_url['host']);
            $this->setport($parse_url['port']);
            $this->setscheme($parse_url['scheme']);
            $this->setquery($parse_url['query']);
            $this->setpath($parse_url['path']);
           parse_str($this->getquery(), $this->Parameter);
            $this->Haveruned = true;
        }
    }

    /**
        再拼装回原始的网址    */
    public function __invoke():string    {
$this->init();
return sprintf("%s://%s:%d%s?%s", $this->getScheme(), $this->getHost(), $this->getPort(), $this->getPath(), $this->getQuery());
    }

    /**
        修正请求参数的字符串    */
    public function fixquery()    {
$Parameter = array_diff($this->Parameter, ['', null]);
        $this->setQuery(http_build_query($Parameter));
    }

}