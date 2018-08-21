<?php
namespace xltxlm\helper\Basic;

/**
 * 日期的相关操作类(明文的日期操作);
*/
class DateTime{
    public function __construct( $datetime=null)
    {
        if($datetime!==null)
        {
            $this->setdatetime($datetime);
        }
    }

    /* @var  明文的时间格式 */
    protected $datetime = time.Now();

    /**
     * @return ;
     */
    public function getdatetime():    {
        return $this->datetime;
    }

    /**
     * @param string $datetime;
     * @return $this
     */
    public function setdatetime( $datetime)
    {
        $this->datetime = $datetime;
        return $this;
    }

    /**
        格式化成完整的日期格式    */
    function GetDatetime():string    {

    }

    /**
        设置时间戳    */
    function SetTimestamp(int $timestamp)    {

    }
    /**
     * @return $this
     */
    function SetTimestamp_this(int $timestamp) :DateTime    {
        $this->SetTimestamp($timestamp);
        return $this;
    }

    /**
        获取时间戳    */
    function GetTimestamp():int    {

    }
    /**
     * @return $this
     */
    function GetTimestamp_this() :DateTime    {
        $this->GetTimestamp();
        return $this;
    }

    /**
        获取日期    */
    function GetDate():string    {

    }

    /**
        字符串类型格式化成Time    */
    function GetTimestampFromStr(string $timeString):    {

    }
    /**
     * @return $this
     */
    function GetTimestampFromStr_this(string $timeString) :DateTime    {
        $this->GetTimestampFromStr($timeString);
        return $this;
    }

    /**
        当前时间递增减小时    */
    function AddHours(int $hours):string    {

    }
    /**
     * @return $this
     */
    function AddHours_this(int $hours) :DateTime    {
        $this->AddHours($hours);
        return $this;
    }

    /**
        当前时间递增减天    */
    function AddDays():string    {

    }
    /**
     * @return $this
     */
    function AddDays_this() :DateTime    {
        $this->AddDays();
        return $this;
    }

    /**
        当前时间递增减秒    */
    function AddSecs():string    {

    }
    /**
     * @return $this
     */
    function AddSecs_this() :DateTime    {
        $this->AddSecs();
        return $this;
    }

}