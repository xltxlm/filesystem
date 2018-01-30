<?php
/**
 * Created by PhpStorm.
 * User: xialintai
 * Date: 2018/1/16
 * Time: 19:07
 */

namespace xltxlm\helper\Harray;

/**
 * 作为参数传递[客户端使用]
 * Class SignParam
 */
final class SignGetParam
{
    use  SignTrait;

    /**
     * 返回get方式需要追加的参数
     * @return string
     */
    public function __invoke(): string
    {
        return http_build_query(
            (new Sign())
                ->setSignArray($this->getSignArray())
                ->setNeedKeys($this->getNeedKeys())
                ->setUnsetKeys($this->getUnsetKeys())
                ->setKey($this->getKey())
                ->__invoke()
        );
    }

}