<?php
/**
 * Created by PhpStorm.
 * User: xialintai
 * Date: 2017/1/13
 * Time: 16:46.
 */

namespace xltxlm\helper\Hclass;

/**
 * 根据类,生成对应的属性名称拷贝类,文件的生成位置在文件的边上
 * Class CopyObjectAttributeNameMakeTool.
 */
class CopyObjectAttributeNameMakeTool
{
    /** @var array 需要生成的类的名称 */
    protected $classNames = [];

    /**
     * @return array
     */
    public function getClassNames(): array
    {
        return $this->classNames;
    }

    /**
     * @param string $classNames
     *
     * @return CopyObjectAttributeNameMakeTool
     */
    public function setClassNames(string $classNames): CopyObjectAttributeNameMakeTool
    {
        $this->classNames[] = $classNames;

        return $this;
    }

    public function __invoke()
    {
        foreach ($this->getClassNames() as $className) {
            (new CopyObjectAttributeNameMakeToolUnit())
                ->setClassName($className)
                ->__invoke();
        }
    }
}
