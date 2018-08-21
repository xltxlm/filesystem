package Basic
import "time"
type DateTime struct {
    /* 明文的时间格式 */
    datetime time.Time

}

func NewDateTime() *DateTime{
    var this = new(DateTime)
        this.datetime=time.Now();
    return this
}


/**
    格式化成完整的日期格式*/
func (this *DateTime)GetDatetime()string{
return  this.datetime.Format("2006-01-02 15:04:05")
}

/**
    设置时间戳*/
func (this *DateTime)SetTimestamp(timestamp int){
this.datetime=time.Unix(int64(timestamp),0)
}
func (this *DateTime)SetTimestamp_this(timestamp int) *DateTime{
    this.SetTimestamp(timestamp);
    return this;
}

/**
    获取时间戳*/
func (this *DateTime)GetTimestamp()int{
return int(this.datetime.Unix())
}
func (this *DateTime)GetTimestamp_this() *DateTime{
    this.GetTimestamp();
    return this;
}

/**
    获取日期*/
func (this *DateTime)GetDate()string{
return  this.datetime.Format("2006-01-02")
}

/**
    字符串类型格式化成Time*/
func (this *DateTime)GetTimestampFromStr(timeString string)time.Time{
if timeString == "" {
		return time.Time{}
	}
	layouts := []string{
		"2006-01-02 15:04:05 -0700 MST",
		"2006-01-02 15:04:05 -0700",
		"2006-01-02 15:04:05",
		"2006/01/02 15:04:05 -0700 MST",
		"2006/01/02 15:04:05 -0700",
		"2006/01/02 15:04:05",
		"2006-01-02 -0700 MST",
		"2006-01-02 -0700",
		"2006-01-02",
		"2006/01/02 -0700 MST",
		"2006/01/02 -0700",
		"2006/01/02",
		"2006-01-02 15:04:05 -0700 -0700",
		"2006/01/02 15:04:05 -0700 -0700",
		"2006-01-02 -0700 -0700",
		"2006/01/02 -0700 -0700",
		time.ANSIC,
		time.UnixDate,
		time.RubyDate,
		time.RFC822,
		time.RFC822Z,
		time.RFC850,
		time.RFC1123,
		time.RFC1123Z,
		time.RFC3339,
		time.RFC3339Nano,
		time.Kitchen,
		time.Stamp,
		time.StampMilli,
		time.StampMicro,
		time.StampNano,
	}

Location, _ := time.LoadLocation("Local")
	var t time.Time
	var err error
	for _, layout := range layouts {
		t, err = time.ParseInLocation(layout, timeString,Location)
		if err == nil {
                        this.datetime=t
			return t
		}
	}
	panic(err)
}
func (this *DateTime)GetTimestampFromStr_this(timeString string) *DateTime{
    this.GetTimestampFromStr(timeString);
    return this;
}

/**
    当前时间递增减小时*/
func (this *DateTime)AddHours(hours int)string{
this.datetime = time.Unix(this.datetime.Unix()+int64(3600*hours),0)
return  this.datetime.Format("2006-01-02 15:04:05")
}
func (this *DateTime)AddHours_this(hours int) *DateTime{
    this.AddHours(hours);
    return this;
}

/**
    当前时间递增减天*/
func (this *DateTime)AddDays()string{
return  this.datetime.Format("2006-01-02 15:04:05")
}
func (this *DateTime)AddDays_this() *DateTime{
    this.AddDays();
    return this;
}

/**
    当前时间递增减秒*/
func (this *DateTime)AddSecs()string{
return  this.datetime.Format("2006-01-02 15:04:05")
}
func (this *DateTime)AddSecs_this() *DateTime{
    this.AddSecs();
    return this;
}

