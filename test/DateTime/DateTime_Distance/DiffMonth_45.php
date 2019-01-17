<?php

namespace xltxlm\helper\test\DateTime\DateTime_Distance;
use xltxlm\helper\DateTime\DateTime_Distance;

/**
 *
 */
class DiffMonth_45
{

    public function __invoke()
    {
        $month = (new DateTime_Distance())
            ->setdatetime1(strtotime('2018-05-2'))
            ->setdatetime2(strtotime('2018-07-02'))
            ->DiffMonth();
        \xltxlm\helper\Util::d($month);
        if($month!=2)
        {
            throw new \Exception('月份错误');
        }

    }

}

