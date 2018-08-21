package Str

import (
	"log"
	"libs/helper/go/Basic"
)

func TestToLowerCase_20() {
	log.SetFlags(log.Lshortfile | log.LstdFlags)
	news := Basic.NewStr("aBBc").ToLowerCase()
	if news != "abbc" {
		log.Fatal(news)
	}
	log.Print("ok")

}
