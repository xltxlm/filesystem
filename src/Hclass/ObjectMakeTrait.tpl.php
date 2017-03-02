<?php /** @var \xltxlm\helper\Hclass\ObjectMakeTrait $this */ ?>
<<?='?'?>php
namespace <?=$this->getNameSpace()?>;

trait <?=$this->getReflectionClass()->getShortName()?>Trait
{
    /** @var  <?=$this->getReflectionClass()->getShortName()?> */
    protected $<?=$this->getReflectionClass()->getShortName()?>;

    /**
     * @return <?=$this->getReflectionClass()->getShortName()?>
     */
    public function get<?=$this->getReflectionClass()->getShortName()?>(): <?=$this->getReflectionClass()->getShortName()?>
    {
        if (empty($this-><?=$this->getReflectionClass()->getShortName()?>)) {
            $this-><?=$this->getReflectionClass()->getShortName()?> = (new <?=$this->getReflectionClass()->getShortName()?>);
        }
        return $this-><?=$this->getReflectionClass()->getShortName()?>;
    }
}