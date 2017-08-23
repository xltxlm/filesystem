<?php
/**
 * Created by PhpStorm.
 * User: xialintai
 * Date: 2017/8/22
 * Time: 18:38
 */

namespace xltxlm\helper\Url;

/**
 * 利用openssl的证书进行加密，解密-公钥
 * Class OpensslPublicdeCrypt
 * @package kuaigeng\review\vendor\xltxlm\helper\src\Url
 */
class OpensslPublicdeCrypt
{
    use Openssl;

    public function __invoke()
    {
        //解密
        $decrypted = "";
        openssl_public_decrypt(self::base64url_decode($this->getWord()), $decrypted, file_get_contents($this->getKeyfilepath()));
        return $decrypted;
    }
}