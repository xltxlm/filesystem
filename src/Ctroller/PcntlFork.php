<?php
/**
 * Created by PhpStorm.
 * User: xialintai
 * Date: 2018/5/28
 * Time: 下午2:44
 */

namespace xltxlm\helper\Ctroller;


Trait PcntlFork
{
    protected $parentpid = 0;

    /**
     * @return int
     */
    public function getParentpid(): int
    {
        return $this->parentpid;
    }

    /**
     * @param int $parentpid
     * @return $this
     */
    public function setParentpid(int $parentpid)
    {
        $this->parentpid = $parentpid;
        return $this;
    }

    protected $childpid = 0;

    /**
     * @return int
     */
    public function getChildpid(): int
    {
        return $this->childpid;
    }

    /**
     * @param int $childpid
     * @return $this
     */
    public function setChildpid(int $childpid)
    {
        $this->childpid = $childpid;
        return $this;
    }


    /**
     * 回调起子进程ß
     * @param callable $function
     */
    protected function fork(callable $function)
    {
        $this->setParentpid($parentid = posix_getpid());
        $pid = pcntl_fork();
        if ($pid == 0) {
            declare(ticks=1);
            $mypid = posix_getpid();
            //\xltxlm\helper\Util::d("子进程开始存活了:$mypid,父进程是:{$this->getParentpid()}");
            $canquit = false;
            //执行完毕代码之后接受父进程退出的指令.
            $sighandler = function ($signo) use (&$canquit) {
                //\xltxlm\helper\Util::d("子进程没开始就收到通知了:" . $signo);
                $canquit = true;
            };
            pcntl_signal(SIGINT, $sighandler);

            call_user_func($function);
            //\xltxlm\helper\Util::d("子进程[$mypid]结束,苦等信号:");

            if ($canquit) {
                die;
            }
            //子进程没有退出前，代码不退出
            $i = 0;
            while (true) {
                usleep(1000 * 1000);
                if ($i++ > 5) {
                    //\xltxlm\helper\Util::d("子进程(" . posix_getpid() . "),不耐心,退出了:$i");
                    die;
                }
            }
            exit;
        } else {
            $this->setChildpid($pid);
            register_shutdown_function(function () use ($pid,$parentid) {
                $result = posix_kill($this->getChildpid(), SIGINT);
                //\xltxlm\helper\Util::d("父进程退出了: {$parentid}");
            });

            return $pid;
        }
    }

}