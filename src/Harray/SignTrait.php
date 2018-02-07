<?php
/**
 * Created by PhpStorm.
 * User: xialintai
 * Date: 2018/1/16
 * Time: 19:03
 */

namespace xltxlm\helper\Harray;


trait SignTrait
{
    /** @var array 需要处理的数组 */
    protected $signArray = [];
    /** @var array 需要尝试加密的索引 */
    protected $needKeys = [];
    /** @var array 需要排除掉的key */
    protected $unsetKeys = [];

    /** @var string 接口秘钥，保存在各自的机器上面 */
    protected $key = '';

    /** @var string 签名的字段名称 */
    protected $signKeyname = '_md5sign';

    /** @var array 所有参与前面的数据 */
    protected $AllsignArray = [];

    /**
     * @return array
     */
    public function getAllsignArray(): array
    {
        return $this->AllsignArray;
    }

    /**
     * @param array $AllsignArray
     * @return SignTrait
     */
    public function setAllsignArray(array $AllsignArray)
    {
        $this->AllsignArray = $AllsignArray;
        return $this;
    }


    /**
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * @param string $key
     * @return $this
     */
    public function setKey(string $key)
    {
        $this->key = $key;
        return $this;
    }


    /**
     * @return string
     */
    public function getSignKeyname(): string
    {
        return $this->signKeyname;
    }

    /**
     * @param string $signKeyname
     * @return SignTrait
     */
    public function setSignKeyname(string $signKeyname): SignTrait
    {
        $this->signKeyname = $signKeyname;
        return $this;
    }

    /**
     * @return array
     */
    public function getUnsetKeys(): array
    {
        return $this->unsetKeys;
    }

    /**
     * @param array $unsetKeys
     * @return $this
     */
    public function setUnsetKeys(array $unsetKeys)
    {
        $this->unsetKeys = $unsetKeys;
        return $this;
    }

    /**
     * @return array
     */
    public function getNeedKeys(): array
    {
        return $this->needKeys;
    }

    /**
     * @param array $needKeys
     * @return $this
     */
    public function setNeedKeys(array $needKeys)
    {
        if ($needKeys) {
            $this->needKeys = $needKeys;
            //追加一个必须排除的签名key名字
            $this->unsetKeys[] = $this->getSignKeyname();
        }
        return $this;
    }

    /**
     * @param array $signArray
     * @return $this
     */
    public function setSignArray(array $signArray)
    {
        $this->signArray = $signArray;
        return $this;
    }

    /**
     * @return array
     */
    protected function getSignArray(): array
    {
        return $this->signArray;
    }
}