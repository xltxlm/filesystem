<?php
namespace xltxlm\helper\DateTime;

use xltxlm\helper\Hclass\LoadFromArray;
/**
 * 日期扩展:计算2个日期的距离;
*/
class DateTime_Distance{
    use LoadFromArray;



    /* @var int 起始日期的时间戳 */
    protected $datetime1;

    /**
     * @return int;
     */
    public function getdatetime1():int    {
        return $this->datetime1;
    }

    /**
     * @param int $datetime1;
     * @return $this
     */
    public function setdatetime1(int $datetime1)
    {
        $this->datetime1 = $datetime1;
        return $this;
    }

    /* @var int 结束日期的时间戳 */
    protected $datetime2;

    /**
     * @return int;
     */
    public function getdatetime2():int    {
        return $this->datetime2;
    }

    /**
     * @param int $datetime2;
     * @return $this
     */
    public function setdatetime2(int $datetime2)
    {
        $this->datetime2 = $datetime2;
        return $this;
    }

    /**
        计算距离的月份    */
    public function DiffMonth():int    {
$startdateTime = new \DateTime(date('Y-m-d H:i:s', $this->getdatetime1()));
        $enddateTime = new \DateTime(date('Y-m-d H:i:s', $this->getdatetime2()));
        return max(1, ($startdateTime->diff($enddateTime)->format('%y') * 12) + $startdateTime->diff($enddateTime)->format('%m'));
    }

}