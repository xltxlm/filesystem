<?php
/**
 * Created by PhpStorm.
 * User: xialintai
 * Date: 2017/6/15
 * Time: 11:26
 */

namespace xltxlm\helper\Harray;

/**
 * 针对传递进来的数组，进行加密，解密操作
 * 按照字母排序。
 * Class Sign
 * @package xltxlm\helper\Harray
 */
class Sign
{
    /** @var array 需要处理的数组 */
    protected $array = [];
    /** @var array 需要排除掉的key，2选1 */
    protected $unsetKeys = [];
    /** @var array 需要尝试加密的索引，2选1 */
    protected $needKeys = [];

    /**
     * @return array
     */
    public function getUnsetKeys(): array
    {
        return $this->unsetKeys;
    }

    /**
     * @param array $unsetKeys
     * @return Sign
     */
    public function setUnsetKeys(array $unsetKeys): Sign
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
     * @return Sign
     */
    public function setNeedKeys(array $needKeys): Sign
    {
        $this->needKeys = $needKeys;
        return $this;
    }


    /**
     * @return array
     */
    protected function getArray(): array
    {
        return $this->array;
    }

    /**
     * @param array $array
     * @return Sign
     */
    public function setArray(array $array): Sign
    {
        $this->array = $array;
        return $this;
    }


    public function getGetParam()
    {
        $this->param();
        return http_build_query($this->getArray());
    }

    public function getPostParam()
    {
        $this->param();
        return $this->getArray();
    }


    public function checkSign(): bool
    {
        $oldmd5sign = $this->array['md5sign'];
        $this->param();
        return $oldmd5sign == $this->array['md5sign'];
    }

    private function param(): void
    {
        $newarray = [];
        //取到必须指定的key
        if (empty($this->getNeedKeys())) {
            foreach ($this->getArray() as $key => $item) {
                if ($key != 'md5sign' && !in_array($key, $this->getUnsetKeys())) {
                    $this->needKeys[] = $key;
                }
            }
        }
        //传递的值必须不是数字类型啊！！
        foreach ($this->getNeedKeys() as $needKey) {
            //
            if (!is_array($this->getArray()[$needKey])) {
                $newarray[$needKey] = (string)$this->getArray()[$needKey];
            }
        }
        if (!$this->array['unixtimestamp']) {
            $this->array['unixtimestamp'] = $newarray['unixtimestamp'] = time();
        } else {
            $newarray['unixtimestamp'] = (int)$this->array['unixtimestamp'];
        }
        ksort($newarray);
        $md5str = json_encode($newarray, JSON_UNESCAPED_UNICODE);
        $md5sign = md5($md5str);
        $this->array['md5sign'] = $md5sign;
    }
}