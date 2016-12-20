<?php

namespace xltxlm\helper\Url;

/**
 * 矫正网址路径
 * Class FixUrl.
 */
final class FixUrl
{
    /** @var string 初始化的网址 */
    protected $url = '';
    /** @var array 需要删除掉的参数 */
    protected $unserKeys = [];
    /** @var array 需要附加上去的 key=>var 参数对 */
    protected $attachKesy = [];
    /** @var bool 取得网址之后是否直接跳转走? */
    protected $Jump = false;

    /**
     * FixUrl constructor.
     *
     * @param string $url
     */
    public function __construct(string $url = '')
    {
        $this->setUrl($url);
    }

    /**
     * @return bool
     */
    public function isJump(): bool
    {
        return $this->Jump;
    }

    /**
     * @param bool $Jump
     *
     * @return FixUrl
     */
    public function setJump(bool $Jump): FixUrl
    {
        $this->Jump = $Jump;

        return $this;
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
     *
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
     *
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
     *
     * @return FixUrl
     */
    public function setAttachKesy(array $attachKesy): FixUrl
    {
        $this->attachKesy = $attachKesy;

        return $this;
    }

    /**
     * 取到重新拼装的网址
     *
     * @return string
     */
    public function __invoke()
    {
        //如果不传递网址进来处理,那么默认取出当前网址
        if (empty($this->url)) {
            $this->url = ($_SERVER['HTTPS'] ? 'https' : 'http') . '://' .
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
        $addHead = "/";
        if ($this->url) {
            $addHead = "{$parseUrl['scheme']}://{$parseUrl['host']}{$parseUrl['path']}";
        }
        if ($parseStrs) {
            $url = "$addHead?" . http_build_query($parseStrs);
        } else {
            $url = "$addHead";
        }
        $this->jump($url);

        return $url;
    }

    /**
     * 跳转.
     *
     * @param $url
     */
    private function jump($url)
    {
        if ($this->isJump()) {
            if (!headers_sent()) {
                header("location:$url");
            } else {
                echo '<script language="javascript">window.location.href="' . $url . '"; </script>';
            }
            die;
        }
    }
}