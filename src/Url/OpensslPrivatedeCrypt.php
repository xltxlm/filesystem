<?php
/**
 * Created by PhpStorm.
 * User: xialintai
 * Date: 2017/8/22
 * Time: 18:49
 */

namespace xltxlm\helper\Url;


class OpensslPrivatedeCrypt
{
    use Openssl;

    public function __invoke()
    {
        //解密
        $decrypted = "";
        openssl_private_decrypt(self::base64url_decode($this->getWord()), $decrypted, file_get_contents($this->getKeyfilepath()));
        return $decrypted;
    }
}