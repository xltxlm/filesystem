<?php

namespace xltxlm\helper\File;

/**
 * 加载文件,每行一个,带trim;
 */
class FileReadLines extends FileReadLines_implements
{
    public function __invoke()
    {
        $lines = file($this->getFilepath());
        foreach ($lines as $line) {
            $line = trim($line);
            if (strlen($line) == 0) {
                continue;
            }
            yield $line;
        }
    }


}