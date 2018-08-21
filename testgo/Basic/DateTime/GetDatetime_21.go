package DateTime

import (
	"log"
	"libs/helper/go/Basic"
)

func TestGetDatetime_21() {
	log.SetFlags(log.Lshortfile | log.LstdFlags)
	datetime := Basic.NewDateTime().GetDatetime()
	if datelen := len(datetime); datelen != 19 {
		panic(datetime)
	}
}
