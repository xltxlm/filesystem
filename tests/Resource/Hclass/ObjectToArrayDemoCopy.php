<?php

namespace xltxlm\helper\tests\Resource\Hclass;

use \xltxlm\helper\Hclass\CopyObjectAttributeName;
/**
* Created by PhpStorm.
* User: xialintai
* Date: 2017/1/13
* Time: 16:48
*/

class ObjectToArrayDemoCopy
{
    use CopyObjectAttributeName;

            protected $id;

        /**
         * @return string
         */
        public static function id() :string
        {
            return (self::selfInstance())->varname(self::selfInstance()->id);
        }
            protected $name;

        /**
         * @return string
         */
        public static function name() :string
        {
            return (self::selfInstance())->varname(self::selfInstance()->name);
        }
    }
