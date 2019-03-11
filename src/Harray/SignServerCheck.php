<?php
/**
 * Created by PhpStorm.
 * User: xialintai
 * Date: 2018/1/16
 * Time: 19:03
 */

namespace xltxlm\helper\Harray;

/**
 * 签名检测[服务端使用]
 * Class CheckSign
 * @package xltxlm\helper\Harray
 */
class SignServerCheck
{
    use  SignTrait;


    public function __invoke()
    {
        //服务端默认接受的数据全部作为签名用，不用做特殊指定
        $signObject = new Sign;
        $signArray = $signObject
            ->setSignArray($this->getSignArray())
            ->setNeedKeys($this->getNeedKeys())
            ->setUnsetKeys($this->getUnsetKeys())
            ->setKey($this->getKey())
            ->__invoke();

        if ($this->getSignArray()[$this->getSignKeyname()] != $signArray[$this->getSignKeyname()]) {
            throw new \Exception("正确签名为:{$signArray[$this->getSignKeyname()]} " . ' || 正确的签名字符串:' . http_build_query($signObject->getAllsignArray()) . "||" . $signObject->getKey());
        }
        return true;
    }
}