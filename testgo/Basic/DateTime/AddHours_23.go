package DateTime

import (
	"log"
	"libs/helper/go/Basic"
)

func TestAddHours_23() {
	log.SetFlags(log.Lshortfile | log.LstdFlags)
	a := Basic.NewDateTime().GetTimestampFromStr_this("2018-03-01 10:10:10").AddHours(1)
	log.Print(a)
	if a != "2018-03-01 11:10:10" {
		panic(a)
	}
}
