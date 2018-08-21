package Str

import (
	"log"
	"libs/helper/go/Basic"
	"reflect"
)

func TestSplit_27() {
	log.SetFlags(log.Lshortfile | log.LstdFlags)
	a := Basic.NewStr("a,b,c").Split(",")
	b := []string{"a", "b", "c"}
	log.Print(a)
	log.Print(b)
	if !reflect.DeepEqual(a, b) {
		panic(a)
	}
}
