<?php

namespace xltxlm\helper\Str;

use Overtrue\Pinyin\Pinyin;

/**
 * 转换成拼音;
 */
class Str_To_Pinyin extends Str_To_Pinyin_implements
{
    public function __invoke(): string
    {
        $pinyin = new Pinyin();
        $item = trim(strtr($this->getValue(), ["'" => '']));
        $sentence = $pinyin->sentence($item);
        return preg_replace('/[ ，,]/', '_', strtoupper($sentence));
    }


}