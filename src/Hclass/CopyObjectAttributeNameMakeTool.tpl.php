<?php /** @var \xltxlm\helper\Hclass\CopyObjectAttributeNameMakeToolUnit $this */?>
<<?= '?' ?>php

namespace <?=$this->getReflectionClass()->getNamespaceName()?>;

use \xltxlm\helper\Hclass\CopyObjectAttributeName;
/**
* Created by PhpStorm.
* User: xialintai
* Date: 2017/1/13
* Time: 16:48
*/

class <?=$this->getShortClassName()?>Copy
{
    use CopyObjectAttributeName;

    <?php
        /** @var  \ReflectionProperty $property */
    foreach ($this->getReflectionClass()->getProperties() as $property) { ?>
        protected $<?=$property->getName()?>;

        /**
         * @return string
         */
        public static function <?=$property->getName()?>() :string
        {
            return (self::selfInstance())->varname(self::selfInstance()-><?=$property->getName()?>);
        }
    <?php }?>
}
