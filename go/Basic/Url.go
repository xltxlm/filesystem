package Basic

type Url struct {
    /* 需要处理的网址 */
    Url string

    /* 协议 */
    Scheme string

    /*  */
    Host string

    /*  */
    Port int

    /*  */
    Path string

    /*  */
    Parameter array

    /*  */
    Query string

    /* 第一个初始化解析 */
    Haveruned bool

}

func NewUrl(Url string,Scheme string,Host string,Port int,Path string,Parameter array,Query string,Haveruned bool) *Url{
    var this = new(Url)
    this.SetUrl(Url);
    this.SetScheme(Scheme);
    this.SetHost(Host);
    this.SetPort(Port);
    this.SetPath(Path);
    this.SetParameter(Parameter);
    this.SetQuery(Query);
    this.SetHaveruned(Haveruned);
    return this
}

func (this *Url)GetUrl() string{
    return this.Url;
}

func (this *Url)SetUrl(Url string) *Url{
    this.Url = Url;
    return this
}
func (this *Url)GetScheme() string{
    return this.Scheme;
}

func (this *Url)SetScheme(Scheme string) *Url{
    this.Scheme = Scheme;
    return this
}
func (this *Url)GetHost() string{
    return this.Host;
}

func (this *Url)SetHost(Host string) *Url{
    this.Host = Host;
    return this
}
func (this *Url)GetPort() int{
    return this.Port;
}

func (this *Url)SetPort(Port int) *Url{
    this.Port = Port;
    return this
}
func (this *Url)GetPath() string{
    return this.Path;
}

func (this *Url)SetPath(Path string) *Url{
    this.Path = Path;
    return this
}
func (this *Url)GetParameter() array{
    return this.Parameter;
}

func (this *Url)SetParameter(Parameter array) *Url{
    this.Parameter = Parameter;
    return this
}
func (this *Url)GetQuery() string{
    return this.Query;
}

func (this *Url)SetQuery(Query string) *Url{
    this.Query = Query;
    return this
}
func (this *Url)GetHaveruned() bool{
    return this.Haveruned;
}

func (this *Url)SetHaveruned(Haveruned bool) *Url{
    this.Haveruned = Haveruned;
    return this
}

/**
    根据参数名称,返回参数的值*/
func (this *Url)GetParameterByName(name string)string{

}

/**
    根据参数名字设置值*/
func (this *Url)SetParameterByName(name string,value ){

}
func (this *Url)SetParameterByName_this(name string,value ) *Url{
    this.SetParameterByName(name,value);
    return this;
}

/**
    设置数组类型的参数*/
func (this *Url)SetArrayParameterByName(name string,value string){

}
func (this *Url)SetArrayParameterByName_this(name string,value string) *Url{
    this.SetArrayParameterByName(name,value);
    return this;
}

/**
    取消指定请求名*/
func (this *Url)UnSetParameterByName(name string){

}
func (this *Url)UnSetParameterByName_this(name string) *Url{
    this.UnSetParameterByName(name);
    return this;
}

/**
    初始化解析网址*/
func (this *Url)init(){

}

/**
    再拼装回原始的网址*/
func (this *Url)__invoke()string{

}

/**
    修正请求参数的字符串*/
func (this *Url)fixquery(){

}

