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
            if (is_array($var)) {
                foreach ($var as $k => $item) {
                    //如果值已经存在,不要重复添加
                    if (is_array($parseStrs[$key]) && array_search($item, $parseStrs[$key]) !== false) {
                        continue;
                    }
                    if (is_numeric($k)) {
                        $parseStrs[$key][] = $item;
                    } else {
                        $parseStrs[$key][$k] = $item;
                    }
                }
            } else {
                $parseStrs[$key] = $var;
            }
        }
        $addHead = '/';
        if (strpos($this->url, '://') !== false) {
            $addHead = "{$parseUrl['scheme']}://{$parseUrl['host']}" . ((empty($parseUrl['port']) || $parseUrl['port'] == 80) ? '' : ':' . $parseUrl['port']) . "{$parseUrl['path']}";
        }
        if ($parseStrs) {
            $addStr = [];
            foreach ($parseStrs as $key => $parseStr) {
                if (is_array($parseStr)) {
                    foreach ($parseStr as $key2 => $item) {
                        $addStr[] = $key . "[$key2]=" . urlencode($item);
                    }
                } else {
                    //路径参数不编码
                    if ($key == 'c') {
                        $addStr[] = "$key=" . ($parseStr);
                    } //其他参数编码
                    else {
                        $addStr[] = "$key=" . urlencode($parseStr);
                    }
                }
            }
            $url = "$addHead?" . implode('&', ($addStr));
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
            if (strpos($url, '://') !== false) {
                $to = parse_url($url);
                if ($to['host'] . ':' . $to['port'] != $_SERVER['HTTP_HOST'] && $to['host'] != $_SERVER['HTTP_HOST']) {
                    echo "即将跳转的网址不是本站网址，确认跳转? <br><a href='$url'>$url</a>";
                    die;
                }
            }
            if (!headers_sent()) {
                header("location:$url");
            } else {
                echo '<script language="javascript">window.location.href="' . $url . '"; </script>';
            }
            die;
        }
    }
}
