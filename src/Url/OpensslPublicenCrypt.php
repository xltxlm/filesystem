<?php
/**
 * Created by PhpStorm.
 * User: xialintai
 * Date: 2017/8/22
 * Time: 18:48
 */

namespace xltxlm\helper\Url;


class OpensslPublicenCrypt
{
    use Openssl;
    /**
     * @return string
     */
    public function __invoke()
    {
        //加密
        $crypted = '';
        openssl_public_encrypt($this->getWord(), $crypted, file_get_contents($this->getKeyfilepath()));
        return self::base64url_encode($crypted);
    }

}