<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-04-09
 * Time: 下午 9:50
 */

namespace xltxlm\helper\tests\Hdir;


use PHPUnit\Framework\TestCase;
use xltxlm\helper\Hdir\Dir;

class DirTest extends TestCase
{

    public function test()
    {
        $dir = (new Dir('D:\code\helper\tests\Ctroller'))
            ->setOnlyFile(true)
            ->setPreg('demo');
        foreach ($dir() as $item) {
            echo "<pre>-->";
            print_r($item);
            echo "<--@in " . __FILE__ . " on line " . __LINE__ . "\n";
        }
    }
}