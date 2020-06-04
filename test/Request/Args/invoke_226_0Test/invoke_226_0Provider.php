<?php
namespace xltxlm\helper\test\Request\Args\invoke_226_0Test;

/**
* 测试案例的数据供给
*/
Trait invoke_226_0Provider {

    /**
     * 测试的数据供给器
     */
    public function MyProvider(){
        return [
        ["name","abc",[[],"abc"],"没有这个参数的时候，设置默认值"],
        ["name",0,[ ["name"=>0 ],"abc"],"有这个参数的时候，返回它自身"],
        ["name",["a","b"],[ ["name"=>["a","b"] ],"abc"],"有这个参数的时候，返回它自身"],
        [0,"aa",[ ["aa","bb"] ],"取出第0个索引"],
        ]+ $this->remoteconfig();
    }

    /**
     * 获取远程配置代码。
     * 因为是远程获取配置的原因，所以传递过去一定是字符串
     */
    function remoteconfig()
    {
        $config = [];
        return $config;
    }
}

