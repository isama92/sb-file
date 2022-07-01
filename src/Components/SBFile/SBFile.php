<?php

namespace Borzoni\SBFile\Components\SBFile;

use Borzoni\SBFile\Components\SBFile\Exceptions\InvalidModeException;
use RuntimeException;
use LogicException;
use SplFileObject;
use Borzoni\SBFile\Components\SBFile\Exceptions\FileNotFoundException;
use Borzoni\SBFile\Components\SBFile\Exceptions\IOFileException;

class SBFile implements FileInterface
{
    /**
     * @var \SplFileObject
     */
    protected SplFileObject $fh;

    /**
     * @var string
     */
    protected string $filePath;

    /**
     * @var string
     */
    protected string $mode;

    /**
     * @param string $filePath
     * @param string $mode
     *
     * @throws \Borzoni\SBFile\Components\SBFile\Exceptions\IOFileException
     * @throws \Borzoni\SBFile\Components\SBFile\Exceptions\InvalidModeException
     */
    public function __construct(string $filePath, string $mode)
    {
        $this->setFilePath($filePath);
        $this->setMode($mode);
        $this->setFileHandler();
    }

    /**
     * Close file
     */
    public function __destruct()
    {
        $this->close();
    }

    /**
     * @param string $filePath
     *
     * @return void
     */
    protected function setFilePath(string $filePath): void
    {
        $this->filePath = $filePath;
    }

    /**
     * @param string $mode
     *
     * @return void
     * @throws \Borzoni\SBFile\Components\SBFile\Exceptions\InvalidModeException
     */
    protected function setMode(string $mode): void
    {
        if (!in_array($mode, self::MODES)) {
            throw new InvalidModeException($mode);
        }

        $this->mode = $mode;
    }

    /**
     * @return void
     * @throws \Borzoni\SBFile\Components\SBFile\Exceptions\IOFileException
     */
    protected function setFileHandler(): void
    {
        try {
            $this->fh = $this->createSplFileObject($this->filePath, $this->mode);
        } catch (RuntimeException $e) {
            throw new IOFileException($this->filePath, 'cannot be opened');
        } catch (LogicException $e) {
            throw new IOFileException($this->filePath, 'is a directory');
        }
    }

    /**
     * @param string $filePath
     * @param string $mode
     *
     * @return \SplFileObject
     */
    protected function createSplFileObject(string $filePath, string $mode): SplFileObject
    {
        return new SplFileObject($filePath, $mode);
    }

    /**
     * @inheritDoc
     */
    public function getHandler(): ?SplFileObject
    {
        return $this->fh ?? null;
    }

    /**
     * @inheritDoc
     */
    public function isOpen(): bool
    {
        return isset($this->fh);
    }

    /**
     * @inheritDoc
     */
    public function close(): void
    {
        unset($this->fh);
    }

    /**
     * @inheritDoc
     * @throws \Borzoni\SBFile\Components\SBFile\Exceptions\IOFileException
     */
    public function write(string $data): int
    {
        $result = $this->fh->fwrite($data);

        if ($result === false) {
            throw new IOFileException($this->filePath, 'cannot write');
        }

        return $result;
    }

    /**
     * @inheritDoc
     * @throws \Borzoni\SBFile\Components\SBFile\Exceptions\IOFileException
     */
    public function read(): string
    {
        $fileSize = $this->fh->getSize();
        if ($fileSize === false) {
            throw new IOFileException($this->filePath, 'cannot get file size');
        }

        $content = $this->fh->fread($fileSize);
        if ($content === false) {
            throw new IOFileException($this->filePath, 'cannot get file content');
        }

        return $content;
    }

    /**
     * @inheritDoc
     * @throws \Borzoni\SBFile\Components\SBFile\Exceptions\FileNotFoundException
     */
    public static function fileExists(string $filePath, bool $throwOnFalse = false): bool
    {
        $exists = file_exists($filePath);
        if (!$exists && $throwOnFalse) {
            throw new FileNotFoundException($filePath);
        }
        return $exists;
    }
}
