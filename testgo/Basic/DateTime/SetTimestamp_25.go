package DateTime

import (
	"log"
	"libs/helper/go/Basic"
)

func TestSetTimestamp_25() {
	log.SetFlags(log.Lshortfile | log.LstdFlags)
	a := Basic.NewDateTime().SetTimestamp_this(1519899010).GetDatetime()
	log.Print(a)
	if a != "2018-03-01 18:10:10" {
		panic(a)
	}
}
