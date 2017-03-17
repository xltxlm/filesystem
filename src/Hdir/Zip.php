<?php
/**
 * Created by PhpStorm.
 * User: xialintai
 * Date: 2017/3/17
 * Time: 11:23.
 */

namespace xltxlm\helper\Hdir;

/**
 * 支持把一个文件/文件夹打包成一个zip文件
 * Class Zip.
 */
final class Zip
{
    /** @var  \ZipArchive */
    private $zipObject;

    /** @var string zip文件生成的位置 */
    protected $filename = '';

    /** @var array 添加的文件夹 */
    protected $dirs = [];

    /** @var array 添加的文件 */
    protected $files = [];

    /** @var bool 创建完毕之后,直接触发浏览器下载 */
    protected $download = false;

    /**
     * @return bool
     */
    public function isDownload(): bool
    {
        return $this->download;
    }

    /**
     * @param bool $download
     * @return Zip
     */
    public function setDownload(bool $download): Zip
    {
        $this->download = $download;
        return $this;
    }


    /**
     * Zip constructor.
     *
     * @param string $filename
     */
    public function __construct($filename = '')
    {
        if ($filename) {
            $this->setFilename($filename);
        }
        $this->zipObject = new \ZipArchive;
        if ($this->zipObject->open($this->getFilename(), \ZipArchive::CREATE) !== TRUE) {
            throw new \Exception("创建zip文件失败");
        }
    }

    /**
     * @return string
     */
    public function getFilename(): string
    {
        if (empty($this->filename)) {
            $this->filename = tempnam('/tmp', 'zip');
        }

        return $this->filename;
    }

    /**
     * @param string $filename
     *
     * @return Zip
     */
    public function setFilename(string $filename): Zip
    {
        $this->filename = $filename;

        return $this;
    }

    /**
     * @return array
     */
    public function getDirs(): array
    {
        return $this->dirs;
    }

    /**
     * @param array $dirname
     *
     * @return Zip
     */
    public function setDirs(string $dirname): Zip
    {
        $this->dirs[] = $dirname;
        $this->zip($dirname, $dirname);
        return $this;
    }

    /**
     * @return array
     */
    public function getFiles(): array
    {
        return $this->files;
    }

    /**
     * @param array $files
     * @return Zip
     */
    public function setFiles(string $files, string $asname): Zip
    {
        $this->files[] = $files;
        $this->zipObject->addFile($files, $asname);
        return $this;
    }


    /**
     * @param string $dir
     */
    private function zip(string $dir, string $cutPath = '/tmp/')
    {
        $Directory = new \RecursiveDirectoryIterator($dir);
        $Iterator = new \RecursiveIteratorIterator($Directory);
        /** @var \SplFileInfo $item */
        foreach ($Iterator as $item) {
            if (in_array($item->getFilename(), ['.', '..'])) {
                continue;
            }

            if ($item->isDir()) {
                $this->zip($item->getRealPath(), $cutPath);
            } else {
                $this->zipObject->addFile($item->getRealPath(), strtr($item->getRealPath(), [$cutPath => '']).$item->getBasename());
            }
        }
    }

    /**
     * 返回创建之后的zip文件的路径
     * @return string
     */
    public function __invoke()
    {
        $this->zipObject->close();
        if ($this->isDownload()) {
            header('Content-Type: application/zip');
            header("Content-Disposition: attachment; filename='".basename($this->getFilename()).".zip'");
            readfile($this->getFilename());
            unlink($this->getFilename());

            return "";
        }
        return $this->getFilename();
    }
}
