<?php
/**
 * Created by PhpStorm.
 * User: xialintai
 * Date: 2017/8/22
 * Time: 18:32
 */

namespace xltxlm\helper\Url;

/**
 * 利用openssl的证书进行加密，加密-私钥
 * Class OpensslCrypt
 * @package kuaigeng\review\vendor\xltxlm\helper\src\Url
 */
class OpensslPrivateenCrypt
{
    use Openssl;

    /**
     * @return string
     */
    public function __invoke()
    {
        //加密
        $crypted = '';
        openssl_private_encrypt($this->getWord(), $crypted, file_get_contents($this->getKeyfilepath()));
        return self::base64url_encode($crypted);
    }

}