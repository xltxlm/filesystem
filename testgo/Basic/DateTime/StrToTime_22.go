package DateTime

import (
	"log"
	"libs/helper/go/Basic"
)

func TestStrToTime_22() {
	log.SetFlags(log.Lshortfile | log.LstdFlags)
	a := Basic.NewDateTime().GetTimestampFromStr_this("2018-03-01").GetDatetime()
	log.Print(a)
	if a != "2018-03-01 00:00:00" {
		panic(a)
	}
}
