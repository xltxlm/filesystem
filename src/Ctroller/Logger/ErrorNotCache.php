<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-17
 * Time: 下午 8:20
 */

namespace xltxlm\helper\Ctroller\Logger;


use xltxlm\logger\Log\DefineLog;

class ErrorNotCache extends DefineLog
{
    /** @var string 未捕捉的异常消息 */
    protected $message = "";
    protected $post = [];
    protected $get = [];
    protected $cookie = [];

    /**
     * @return mixed
     */
    public function getPost()
    {
        return $this->post;
    }

    /**
     * @param mixed $post
     * @return ErrorNotCache
     */
    public function setPost($post)
    {
        $this->post = $post;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getGet()
    {
        return $this->get;
    }

    /**
     * @param mixed $get
     * @return ErrorNotCache
     */
    public function setGet($get)
    {
        $this->get = $get;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCookie()
    {
        return $this->cookie;
    }

    /**
     * @param mixed $cookie
     * @return ErrorNotCache
     */
    public function setCookie($cookie)
    {
        $this->cookie = $cookie;
        return $this;
    }

}