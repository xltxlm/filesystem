<?php
namespace xltxlm\helper\Str;

use xltxlm\helper\Hclass\LoadFromArray;
use \xltxlm\redis\LockKey;
/**
 * 字符串的扩展功能:唯一字符串;
*/
class Str_UniqRandomID{
    use LoadFromArray;



    /* @var \xltxlm\redis\Config\RedisConfig Redis缓存服务器 */
    protected $RedisConfig;

    /**
     * @return \xltxlm\redis\Config\RedisConfig;
     */
    public function getRedisConfig():\xltxlm\redis\Config\RedisConfig    {
        return $this->RedisConfig;
    }

    /**
     * @param \xltxlm\redis\Config\RedisConfig $RedisConfig;
     * @return $this
     */
    public function setRedisConfig( $RedisConfig)
    {
        $this->RedisConfig = $RedisConfig;
        return $this;
    }

    /**
        返回一个如果都是采用本方法生成的.
有史以来绝对唯一的值    */
    public function __invoke():string    {
$key = md5(uniqid() . time()) . time();
        //记录下此key.
        $getLock = (new LockKey())
            ->setExpire(3600)
            ->setKey($key)
            ->setRedisConfig($this->getRedisCacheConfigObject())
            ->__invoke();
        if ($getLock == false) {
            throw new \Exception("获取锁失败:");
        }
        return $key;
    }

}