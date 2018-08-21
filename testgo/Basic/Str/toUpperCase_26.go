package Str

import (
	"log"
	"libs/helper/go/Basic"
)

func TesttoUpperCase_26() {
	log.SetFlags(log.Lshortfile | log.LstdFlags)
	a := Basic.NewStr("Abcc").ToUpperCase_this().GetValue()
	log.Print(a)
	if a != "ABCC" {
		panic(a)
	}
}
