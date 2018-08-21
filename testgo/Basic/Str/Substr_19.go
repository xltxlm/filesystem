package Str

import (
     "libs/helper/go/Basic"
    "log"
    )

func TestSubstr_19(){
    news :=Basic.NewStr("abc").Substr(1,1)
    if news!="b"{
        log.Fatal(news)
    }

    news =Basic.NewStr("abcd").Substr(1,10)
    if news!="bcd"{
        log.Fatal(news)
    }
    log.Print("OK")
}
