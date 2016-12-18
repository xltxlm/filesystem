<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-16
 * Time: 下午 12:51.
 */

namespace xltxlm\helper\tests\Hclass;

use PHPUnit\Framework\TestCase;
use xltxlm\helper\Hclass\FilePathFromClass;

class FilePathFromCLassTest extends TestCase
{
    public function test1()
    {
        $className = \xltxlm\helper\Hclass\FilePathFromClass::class;
        $FilePathFromCLass = (new FilePathFromClass($className));

        //文件路径
        $filePath = (new \ReflectionClass($className))->getFileName();
        //文件的命名空间
        $nameSpace = (new \ReflectionClass($className))->getNamespaceName();

        $this->assertEquals($FilePathFromCLass->getFilePath(), $filePath);
        //目录深度:1
        $this->assertEquals($FilePathFromCLass->setDirDepth(1)->getDirPath(), dirname($filePath));
        //目录深度:2
        $this->assertEquals($FilePathFromCLass->setDirDepth(2)->getDirPath(), dirname(dirname($filePath)));
        //目录深度:3
        $this->assertEquals($FilePathFromCLass->setDirDepth(3)->getDirPath(), dirname(dirname(dirname($filePath))));
        //命名空间
        $this->assertEquals($FilePathFromCLass->getNameSpce(), $nameSpace);
        //短名称
        $this->assertEquals($FilePathFromCLass->getBaseName(), 'FilePathFromClass');
    }
}
