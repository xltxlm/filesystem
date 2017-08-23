<?php
/**
 * Created by PhpStorm.
 * User: xialintai
 * Date: 2017/8/22
 * Time: 18:33
 */

namespace xltxlm\helper\Url;


trait Openssl
{
    /** @var string 证书文件路径 */
    protected $keyfilepath = "";
    /** @var string 需要加密解密的字符串 */
    protected $word = "";

    /**
     * @return string
     */
    public function getWord(): string
    {
        return $this->word;
    }

    /**
     * @param string $word
     * @return $this
     */
    public function setWord(string $word)
    {
        $this->word = $word;
        return $this;
    }


    /**
     * @return string
     */
    public function getKeyfilepath(): string
    {
        return $this->keyfilepath;
    }

    /**
     * @param string $keyfilepath
     * @return $this
     */
    public function setKeyfilepath(string $keyfilepath)
    {
        $this->keyfilepath = $keyfilepath;
        return $this;
    }


    protected static function base64url_encode($data)
    {
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
    }

    protected static function base64url_decode($data)
    {
        return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
    }

}