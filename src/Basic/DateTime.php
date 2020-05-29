<?php
namespace xltxlm\helper\Basic;

use xltxlm\helper\Hclass\LoadFromArray;
/**
 * 日期的相关操作类(明文的日期操作);
*/
class DateTime{
    use LoadFromArray;



    /* @var int 明文的时间格式 */
        protected $datetime = 'time.Now()';
    
    /**
     * @return int;
     */
    public function getdatetime():int    {
        return $this->datetime;
    }

    /**
     * @param int $datetime;
     * @return $this
     */
    public function setdatetime( $datetime)
    {
        $this->datetime = $datetime;
        return $this;
    }

    /**
        格式化成完整的日期格式    */
    public function GetDatetimeString():string    {

    }

    /**
        设置时间戳    */
    public function SetTimestamp(int $timestamp = null)    {

    }
    /**
     * @return $this
     */
    function SetTimestamp_this(int $timestamp = null) :DateTime    {
        $this->SetTimestamp($timestamp);
        return $this;
    }

    /**
        获取时间戳    */
    public function GetTimestamp():int    {

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
    public function GetDate():string    {

    }

    /**
        字符串类型格式化成Time    */
    public function GetTimestampFromStr(string $timeString = null)    {

    }
    /**
     * @return $this
     */
    function GetTimestampFromStr_this(string $timeString = null) :DateTime    {
        $this->GetTimestampFromStr($timeString);
        return $this;
    }

    /**
        当前时间递增减小时    */
    public function AddHours(int $hours = null):string    {

    }
    /**
     * @return $this
     */
    function AddHours_this(int $hours = null) :DateTime    {
        $this->AddHours($hours);
        return $this;
    }

    /**
        当前时间递增减天    */
    public function AddDays():string    {

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
    public function AddSecs():string    {

    }
    /**
     * @return $this
     */
    function AddSecs_this() :DateTime    {
        $this->AddSecs();
        return $this;
    }

}