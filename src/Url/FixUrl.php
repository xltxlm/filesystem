<?php
namespace xltxlm\helper\Url;

/**
 * 矫正网址路径
 * Class FixUrl
 * @package xltxlm\helper\Url
 */
final class FixUrl
{
    /** @var string 初始化的网址 */
    protected $url = "";
    /** @var array 需要删除掉的参数 */
    protected $unserKeys = [];
    /** @var array 需要附加上去的 key=>var 参数对 */
    protected $attachKesy = [];

    /**
     * FixUrl constructor.
     * @param string $url
     */
    public function __construct(string $url = "")
    {
        $this->setUrl($url);
    }


    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return FixUrl
     */
    public function setUrl(string $url): FixUrl
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return array
     */
    public function getUnserKeys(): array
    {
        return $this->unserKeys;
    }

    /**
     * @param array $unserKeys
     * @return FixUrl
     */
    public function setUnserKeys(array $unserKeys): FixUrl
    {
        $this->unserKeys = $unserKeys;
        return $this;
    }

    /**
     * @return array
     */
    public function getAttachKesy(): array
    {
        return $this->attachKesy;
    }

    /**
     * @param array $attachKesy
     * @return FixUrl
     */
    public function setAttachKesy(array $attachKesy): FixUrl
    {
        $this->attachKesy = $attachKesy;
        return $this;
    }

    /**
     * 取到重新拼装的网址
     * @return string
     */
    public function __invoke()
    {
        //如果不传递网址进来处理,那么默认取出当前网址
        if (empty($this->url)) {
            $this->url = ($_SERVER['HTTPS'] ? "https" : "http") . "://" .
                ($_SERVER['HTTP_HOST'] ? $_SERVER['HTTP_HOST'] : $_SERVER['SERVER_ADDR']) .
                $_SERVER['REQUEST_URI'];
        }

        $parseUrl = parse_url($this->url);
        $parseStrs = [];
        parse_str($parseUrl['query'], $parseStrs);
        foreach ($this->unserKeys as $unsetArg) {
            //取消二维索引的参数,比如 d=1&a[c]=1 中取消 a[c]索引
            if (is_array($unsetArg)) {
                unset($parseStrs[key($unsetArg)][current($unsetArg)]);
            } else {
                unset($parseStrs[$unsetArg]);
            }
        }

        //2:数组格式 key=>var
        foreach ($this->attachKesy as $key => $var) {
            $parseStrs[$key] = $var;
        }

        if ($parseStrs) {
            return "{$parseUrl['scheme']}://{$parseUrl['host']}{$parseUrl['path']}?" . http_build_query($parseStrs);
        } else {
            return "{$parseUrl['scheme']}://{$parseUrl['host']}{$parseUrl['path']}";
        }
    }


    /**
     * @desc   跳转到指定网址,并且在网址后面追加上指定的参数,值来源于_REWQUEST
     * @author 夏琳泰 mailto:xialt@citssh.com.cn
     * @since  2015-08-17 08:38:05
     *
     * @param   string $url
     * @param   array $args
     */
    public function gourl($url, $args = [])
    {
        $newarray = [];
        foreach ($args as $key => $var) {
            if (is_numeric($key)) {
                $newarray[$var] = $_REQUEST[$var] ? $_REQUEST[$var] : $_POST[$var];
            } else {
                $newarray[$key] = $var;
            }
        }
        $newurl = parent::execute(
            $url,
            $newarray
        );
        $this->execute($newurl);
    }

}