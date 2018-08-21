package Str

import (
"libs/helper/go/Basic"
"log"
)

func TestAtIndex_18() {
	s := "abc"
	news := (new(Basic.Str)).SetValue(s).AtIndex(1)
	if news != "b" {
		log.Fatal("error")
	}
	log.Print("ok")
}
