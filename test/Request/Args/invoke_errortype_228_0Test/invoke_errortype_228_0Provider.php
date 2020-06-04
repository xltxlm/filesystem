<?php
namespace xltxlm\helper\test\Request\Args\invoke_errortype_228_0Test;

/**
* 测试案例的数据供给
*/
Trait invoke_errortype_228_0Provider {

    /**
     * 测试的数据供给器
     */
    public function MyProvider(){
        return [
        ["name",[],[ ["name"=>"1xxx" ], 0,\xltxlm\helper\Request\Args::ARRAY  ],"类型超出基础类型，且不是想要的array，报错"],
        ["name",new \stdclass,[ ["name"=>["1xxx"] ], 0,\xltxlm\helper\Request\Args::OBJECT  ],"类型超出基础类型，且不是想要的object，报错"],
        ["name","",[ ["cc"=>["1xxx"] ], 0,\xltxlm\helper\Request\Args::OBJECT ],"找不到，但是指定了默认值，也指定了类型。但是！默认值类型和指定类型不一致，坑爹吗？"],
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

