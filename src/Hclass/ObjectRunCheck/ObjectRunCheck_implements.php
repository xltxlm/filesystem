<?php
namespace xltxlm\helper\Hclass\ObjectRunCheck;

/**
 * :Trait;
 * 给任何类添加代码运行时检查，时刻提醒自己：是不是必须崩溃？还是可以进行透传。

必须先调用*_set_maybe。才可以调用*_call_maybe。 不要把流程思维当做是异常处理！！

非常像go语言的每次变量赋值都进行 if err != nil {
		fmt.Printf("err:%+v\n",err)
	};
*/
Trait ObjectRunCheck_implements
{


/**
*  匿名函数返回的变量是指定对象。
如果不是：透传;
*  @return ;
*/
abstract protected function object_set_maybe();
/**
*  匿名函数返回的变量必须是指定类型，如果不是返回默认值;
*  @return ;
*/
abstract protected function var_set_maybe();
/**
*  指定的变量如果是指定类型，那么可以执行匿名函数;
*  @return ;
*/
abstract protected function object_call_maybe();
}