<?php /** @var \xltxlm\helper\Hclass\CopyObjectAttributeNameMakeToolUnit $this */?>
<<?= '?' ?>php

namespace <?=$this->getReflectionClass()->getNamespaceName()?>;

use \xltxlm\helper\Hclass\CopyObjectAttributeName;

/**
 * 获取类 <?=$this->getShortClassName()?> 的属性名称
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
