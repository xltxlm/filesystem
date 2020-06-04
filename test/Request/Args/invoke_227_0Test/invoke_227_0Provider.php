<?php
namespace xltxlm\helper\test\Request\Args\invoke_227_0Test;

/**
* 测试案例的数据供给
*/
Trait invoke_227_0Provider {

    /**
     * 测试的数据供给器
     */
    public function MyProvider(){
        return [
        ["name",1,[ ["name"=>"1xxx" ], 0,\xltxlm\helper\Request\Args::INTEGER  ],"要求不仅返回值，还纠正了基础类型INTEGER-1"],
        ["name",0,[ ["aa"],null, \xltxlm\helper\Request\Args::INTEGER ],"没有值，没有默认值，但是指定可初始化的类型INTEGER-0"],
        ["name",[],[ ["aa"],[], \xltxlm\helper\Request\Args::ARRAY ],"没有值，没有默认值，但是指定可初始化的类型ARRAY"],
        ["name",12,[ ["cc"=>"1xxx" ], 12,\xltxlm\helper\Request\Args::INTEGER  ],"要求不仅返回值，还纠正了基础类型。INTEGER"],
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

