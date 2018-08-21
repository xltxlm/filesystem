package Basic
import "strings"
type Str struct {
    /* 需要处理的字符串 */
    Value string

}

func NewStr(Value string) *Str{
    var this = new(Str)
    this.SetValue(Value);
    return this
}

func (this *Str)GetValue() string{
    return this.Value;
}

func (this *Str)SetValue(Value string) *Str{
    this.Value = Value;
    return this
}

/**
    获取指定索引位置的单词，从0开始数起*/
func (this *Str)AtIndex(Atindex int)string{
if Atindex > len(this.Value)-1  {
		this.Value = ""
	} else {
		this.Value = string([]rune(this.Value)[Atindex:Atindex+1])
	}
	return this.Value
}
func (this *Str)AtIndex_this(Atindex int) *Str{
    this.AtIndex(Atindex);
    return this;
}

/**
    追加其他字符串*/
func (this *Str)Append(Addstring string)string{
this.Value = this.Value + Addstring
return this.Value
}
func (this *Str)Append_this(Addstring string) *Str{
    this.Append(Addstring);
    return this;
}

/**
    根据给出的前后索引，截取字符串*/
func (this *Str)Substr(start int,length int)string{
if start+length > len(this.Value) {
   length = len(this.Value) - start
}
this.Value = string([]rune(this.Value)[start:start+length])
return this.Value
}
func (this *Str)Substr_this(start int,length int) *Str{
    this.Substr(start,length);
    return this;
}

/**
    改成小写*/
func (this *Str)ToLowerCase()string{
this.Value=strings.ToLower(this.Value)
return this.Value
}
func (this *Str)ToLowerCase_this() *Str{
    this.ToLowerCase();
    return this;
}

/**
    转换成大写*/
func (this *Str)ToUpperCase()string{
this.Value=strings.ToUpper(this.Value)
return this.Value
}
func (this *Str)ToUpperCase_this() *Str{
    this.ToUpperCase();
    return this;
}

/**
    根据指定的字符串进行截取*/
func (this *Str)SplitBystr(delimiter string,pos int)string{

}
func (this *Str)SplitBystr_this(delimiter string,pos int) *Str{
    this.SplitBystr(delimiter,pos);
    return this;
}

/**
    根据指定的分隔符，截取字符串，返回数组*/
func (this *Str)Split(delimiter string)[]string{
return strings.Split(this.Value,delimiter)
}

/**
    第一个字符大写*/
func (this *Str)Ucfirst()string{

}
func (this *Str)Ucfirst_this() *Str{
    this.Ucfirst();
    return this;
}

/**
    对字符串进行替换*/
func (this *Str)Strtr(oldvar string,newvar string)string{

}
func (this *Str)Strtr_this(oldvar string,newvar string) *Str{
    this.Strtr(oldvar,newvar);
    return this;
}

/**
    判断是否包含另外一个字符串*/
func (this *Str)Strpos(posstr string)bool{

}

/**
    返回当前字符串*/
func (this *Str)__invoke()string{
return this.Value;
}

