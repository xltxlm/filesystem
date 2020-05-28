<?php
namespace xltxlm\helper\Ctroller\UrlLink;

/**
 * :Trait;
 * 控制层引用之后，获取当前相对的网址路径;
*/
Trait UrlLink_implements
{


/**
*  根据当前的类名，返回相对路径;
*  @return ;
*/
abstract public function urlNoFollow(array $args = [],string $classname = null);
}