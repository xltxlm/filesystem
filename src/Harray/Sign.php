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
 */
final class Sign
{
    use SignTrait;


    public function __invoke()
    {
        $this->makesign();
        return $this->getSignArray();
    }


    protected function makesign(): void
    {
        $newarray = [];
        //取到必须指定的key
        if (empty($this->getNeedKeys())) {
            $this->setNeedKeys(array_keys($this->getSignArray()));
        }

        foreach ($this->getNeedKeys() as $needKey) {
            $索引不在排除队列里面 = !in_array($needKey, $this->getUnsetKeys());
            if ($索引不在排除队列里面) {
                $newarray[$needKey] = $this->getSignArray()[$needKey];
            }
        }
        //追加时间，方便后续查看数据，校验数据重放
        if (!$this->signArray['datetime']) {
            $this->signArray['datetime'] = $newarray['datetime'] = date('YmdHis');
        }
        ksort($newarray);
        $this->signArray[$this->getSignKeyname()] = md5(http_build_query($newarray) . $this->getKey());
        $this->setAllsignArray($newarray);
    }
}