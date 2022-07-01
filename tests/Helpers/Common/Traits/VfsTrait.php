<?php

namespace Tests\Helpers\Common\Traits;

use org\bovigo\vfs\vfsStream;

trait VfsTrait
{
    /**
     * @var \org\bovigo\vfs\vfsStreamDirectory
     */
    protected $vfs;

    /**
     * @return void
     */
    protected function initVfs(): void
    {
        $this->vfs = vfsStream::setup('root', 0777);
        file_put_contents($this->getReadHappyPath(), $this->getHappyContent());
    }

    /**
     * @return string
     */
    protected function getReadHappyPath(): string
    {
        return $this->vfs->url() . '/read_good.txt';
    }

    /**
     * @return string
     */
    protected function getReadBadPath(): string
    {
        return $this->vfs->url() . '/read_bad.txt';
    }

    /**
     * @return string
     */
    protected function getWriteHappyPath(): string
    {
        return $this->vfs->url() . '/write_good.txt';
    }

    /**
     * @return string
     */
    protected function getWriteBadPath(): string
    {
        return $this->vfs->url() . '/write_bad.txt';
    }

    /**
     * @return string
     */
    protected function getRootDirPath(): string
    {
        return $this->vfs->url();
    }

    /**
     * @return string
     */
    protected function getHappyContent(): string
    {
        return 'abc' . PHP_EOL . 'def' . PHP_EOL . 'ghi';
    }

    /**
     * @return string
     */
    protected function getBadContent(): string
    {
        return 'ihg' . PHP_EOL . 'fed' . PHP_EOL . 'cba';
    }
}
