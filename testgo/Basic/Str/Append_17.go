package Str

import (
    "libs/helper/go/Basic"
    "log"
)

func TestAppend_17(){
    news :=Basic.NewStr("abc").Append("d")
    if news!="abcd"{
        log.Fatal("error")
    }
    log.Print(news)
}
