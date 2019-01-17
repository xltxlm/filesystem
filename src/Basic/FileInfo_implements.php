<?php
namespace xltxlm\helper\Basic;

/**
 * 文件相关信息提取;
*/
abstract class FileInfo_implements
{



    /* @var string 文件路径 */
        protected $Filepath = '';
    
    /**
     * @return string;
     */
    public function getFilepath():string    {
        return $this->Filepath;
    }

    /**
     * @param string $Filepath;
     * @return $this
     */
    public function setFilepath(string $Filepath)
    {
        $this->Filepath = $Filepath;
        return $this;
    }

    /* @var string 提取扩展名称 */
        protected $extension = '';
    
    /**
     * @return string;
     */
    public function getextension():string    {
        return $this->extension;
    }

    /**
     * @param string $extension;
     * @return $this
     */
    protected function setextension(string $extension)
    {
        $this->extension = $extension;
        return $this;
    }

    /**
     *        *   @return :FileInfo;
    */
    abstract public function __invoke():FileInfo;

}