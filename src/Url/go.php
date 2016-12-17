<?php
namespace xltxlm\helper\Url;

/**
 * Created by PhpStorm.
 * User: xialintai
 * Date: 2015/9/6 0006
 * Time: 15:24
 */
class go extends FixUrl
{
    /**
     * @desc   跳转到指定网址,并且在网址后面追加上指定的参数,值来源于_REWQUEST
     * @author 夏琳泰 mailto:xialt@citssh.com.cn
     * @since  2015-08-17 08:38:05
     *
     * @param   string $url
     * @param   array $args
     */
    public function gourl($url, $args = [])
    {
        $newarray = [];
        foreach ($args as $key => $var) {
            if (is_numeric($key)) {
                $newarray[$var] = $_REQUEST[$var] ? $_REQUEST[$var] : $_POST[$var];
            } else {
                $newarray[$key] = $var;
            }
        }
        $newurl = parent::execute(
            $url,
            $newarray
        );
        $this->execute($newurl);
    }

    /**
     * @desc   跳转到指定的网址
     * @author 夏琳泰 mailto:xialt@citssh.com.cn
     * @since  2015-09-06 15:26:31
     *
     * @param string $url 跳转到的目标地址
     *
     * @return string|void
     */
    public function execute($url)
    {
        /*  @var $log  \libs\log\log */
        $log = new \libs\log\log;
        $log->setType(__CLASS__);
        $log->info(
            "GOTO",
            $url
        );

        define("GO", true);
        //验证$url是否合法.
        if (strpos($url, '://') !== false &&
            strpos(
                $url,
                ($_SERVER['HTTPS'] ? "https" : "http") . "://" . ($_SERVER['HTTP_HOST'])
            ) !== 0
        ) {
        }
        if (!headers_sent()) {
            header("location:$url");
        } else {
            echo '<script language="javascript" type="text/javascript">window.location.href="' . $url . '"; </script>' . "\n";
        }
        die;
    }


}