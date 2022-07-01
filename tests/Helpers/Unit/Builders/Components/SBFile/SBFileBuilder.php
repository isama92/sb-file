<?php

namespace Tests\Helpers\Unit\Builders\Components\SBFile;

use Borzoni\SBFile\Components\SBFile\SBFile;
use SplFileObject;
use Tests\Helpers\Unit\Builders\Components\SBFile\Classes\SBFileWithFakeCollaborator;

class SBFileBuilder
{
    /**
     * @param string $filePath
     * @param string $mode
     *
     * @return \Borzoni\SBFile\Components\SBFile\SBFile
     * @throws \Borzoni\SBFile\Components\SBFile\Exceptions\InvalidModeException
     * @throws \Borzoni\SBFile\Components\SBFile\Exceptions\IOFileException
     */
    public static function make(string $filePath, string $mode): SBFile
    {
        return new SBFile($filePath, $mode);
    }

    /**
     * @param string $filePath
     *
     * @return \Borzoni\SBFile\Components\SBFile\SBFile
     * @throws \Borzoni\SBFile\Components\SBFile\Exceptions\InvalidModeException
     * @throws \Borzoni\SBFile\Components\SBFile\Exceptions\IOFileException
     */
    public static function makeReadMode(string $filePath): SBFile
    {
        return new SBFile($filePath, SBFile::MODE_R);
    }

    /**
     * @param string $filePath
     *
     * @return \Borzoni\SBFile\Components\SBFile\SBFile
     * @throws \Borzoni\SBFile\Components\SBFile\Exceptions\InvalidModeException
     * @throws \Borzoni\SBFile\Components\SBFile\Exceptions\IOFileException
     */
    public static function makeWriteMode(string $filePath): SBFile
    {
        return new SBFile($filePath, SBFile::MODE_W);
    }

    /**
     * @param string $filePath
     * @param string $mode
     * @param SplFileObject $splFileObjectMock
     *
     * @return \Borzoni\SBFile\Components\SBFile\SBFile
     * @throws \Borzoni\SBFile\Components\SBFile\Exceptions\IOFileException
     * @throws \Borzoni\SBFile\Components\SBFile\Exceptions\InvalidModeException
     */
    public static function makeWithFakeCollaborator(
        string $filePath,
        string $mode,
        SplFileObject $splFileObjectMock
    ): SBFile {
        return new SBFileWithFakeCollaborator($filePath, $mode, $splFileObjectMock);
    }
}
