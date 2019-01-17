<?php
namespace xltxlm\helper\File;

/**
 * 加载文件,每行一个,带trim;
*/
abstract class FileReadLines_implements
{



    /* @var string  */
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

    /**
     *        *   @return ;
    */
    abstract public function __invoke();

}