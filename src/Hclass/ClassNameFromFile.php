<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-11-30
 * Time: 下午 12:57.
 */

namespace xltxlm\helper\Hclass;

/**
 * 从一个文件中解析出类名,前提：符合psr-4命名方式
 * Class CLassNameFromFile.
 */
final class ClassNameFromFile
{
    /** @var string 文件路径 */
    protected $filePath = '';
    /** @var string 类名称 */
    private $className = '';
    /** @var string 类的命名空间 */
    private $nameSpace = '';

    /**
     * ClassNameFromFile constructor.
     * @param string $filePath
     */
    public function __construct(string $filePath = "")
    {
        $this->setFilePath($filePath);
    }


    /**
     * @return string
     */
    public function getNameSpace(): string
    {
        return $this->nameSpace;
    }

    /**
     * @return string
     */
    public function getFilePath(): string
    {
        return $this->filePath;
    }

    /**
     * @param string $filePath
     *
     * @return ClassNameFromFile
     */
    public function setFilePath(string $filePath): ClassNameFromFile
    {
        $token = token_get_all(file_get_contents($filePath));
        $namespace = false;
        foreach ($token as $item) {
            if (is_array($item)) {
                $item[0] = token_name($item[0]);
                if ($namespace !== false && $item[0] == 'T_STRING') {
                    $this->nameSpace .= $item[1] . '\\';
                }
                if ($item[0] == 'T_NAMESPACE') {
                    $namespace = true;
                }
            }
            //遇见分号的时候，命名空间才结束
            if ($namespace !== false && $item == ';') {
                break;
            }
        }
        if ($this->getNameSpace()) {
            $this->className = $this->getNameSpace() . basename($filePath, '.php');
        }
        $this->filePath = $filePath;

        return $this;
    }

    /**
     * @return string
     */
    public function getClassName(): string
    {
        return $this->className;
    }
}
