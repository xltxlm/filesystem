<?php
namespace xltxlm\helper\Ctroller\MiniRuninvoke;

/**
 * :Trait;
 * 根据指定的类（没有指定的话，就是自己），获取所有的函数（这里其实已经排序了），指定某个前缀字符串开始的，循坏调起。

用来分离不同操作的代码。;
*/
Trait MiniRuninvoke_implements
{


/**
* @var string $prefix  需要执行的函数的前缀单词
* @var string $paser_classname  根据哪个类来分析函数的列表？默认是自己
*  ;
*  @return ;
*/
abstract public function 分发逻辑器(string $prefix = "run_",string $paser_classname = null);
}