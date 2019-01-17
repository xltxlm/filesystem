<?php

namespace xltxlm\helper\Basic;

/**
 * 文件相关信息提取;
 */
class FileInfo extends FileInfo_implements
{
    public function setFilepath(string $Filepath)
    {
        parent::setFilepath($Filepath);
        return $this->__invoke();
    }

    public function __invoke(): FileInfo
    {
        if (empty($this->getFilepath())) {
            throw new \Exception('文件路径没有设置存在');
        }
        $extension = (new Str())
            ->setValue($this->getFilepath())
            ->Split('.')
            ->GetLast()
            ->getValue();
        $this->setextension($extension);
        return $this;
    }


}