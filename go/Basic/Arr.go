package Basic

type Arr struct {
    /* 原始的字符串数组 */
    DefaultArray []string

}

func NewArr(DefaultArray []string) *Arr{
    var this = new(Arr)
    this.SetDefaultArray(DefaultArray);
    return this
}

func (this *Arr)GetDefaultArray() []string{
    return this.DefaultArray;
}

func (this *Arr)SetDefaultArray(DefaultArray []string) *Arr{
    this.DefaultArray = DefaultArray;
    return this
}

/**
    和另外一个数组比较，取出不同之处*/
func (this *Arr)Diff(StrigArray []string)[]string{
var diff []string

	// Loop two times, first to find this.DefaultArray strings not in StrigArray,
	// second loop to find StrigArray strings not in this.DefaultArray
	for i := 0; i < 2; i++ {
		for _, s1 := range this.DefaultArray {
			found := false
			for _, s2 := range StrigArray {
				if s1 == s2 {
					found = true
					break
				}
			}
			// String not found. We add it to return slice
			if !found {
				diff = append(diff, s1)
			}
		}
		// Swap the slices, only if it was the first loop
		if i == 0 {
			this.DefaultArray, StrigArray = StrigArray, this.DefaultArray
		}
	}

	return diff
}

/**
    追加一个值*/
func (this *Arr)Push(NewString string)[]string{
this.DefaultArray = append(this.DefaultArray,NewString)
return this.DefaultArray
}
func (this *Arr)Push_this(NewString string) *Arr{
    this.Push(NewString);
    return this;
}

/**
    循环里面的值,对于字符串类型,进行trim操作*/
func (this *Arr)MapTrim()[]string{

}
func (this *Arr)MapTrim_this() *Arr{
    this.MapTrim();
    return this;
}

/**
    用指定的函数进行回调*/
func (this *Arr)MapFunction(call_function )[]string{

}
func (this *Arr)MapFunction_this(call_function ) *Arr{
    this.MapFunction(call_function);
    return this;
}

