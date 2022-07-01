<?php

namespace Tests\Unit\Components\SBFile;

use Borzoni\SBFile\Components\SBFile\SBFile;
use Borzoni\SBFile\Components\SBFile\Exceptions\InvalidModeException;
use Borzoni\SBFile\Components\SBFile\Exceptions\IOFileException;
use Tests\Helpers\Unit\Builders\Components\SBFile\SBFileBuilder;

class SBFileConstructorUtTest extends SBFileUtTestCase
{
    /**
     * @test
     *
     * @return void
     * @throws \Borzoni\SBFile\Components\SBFile\Exceptions\IOFileException
     * @throws \Borzoni\SBFile\Components\SBFile\Exceptions\InvalidModeException
     */
    public function createSBFile_ValidParams_InstanceReturned(): void
    {
        // Arrange
        $filePath = $this->getReadHappyPath();

        // Act
        $SBFile = SBFileBuilder::makeReadMode($filePath);

        // Assert
        $this->assertInstanceOf(SBFile::class, $SBFile);
    }

    /**
     * @test
     *
     * @return void
     * @throws \Borzoni\SBFile\Components\SBFile\Exceptions\IOFileException
     * @throws \Borzoni\SBFile\Components\SBFile\Exceptions\InvalidModeException
     */
    public function createSBFile_InvalidMode_ExceptionThrown(): void
    {
        // Arrange
        $filePath = $this->getReadHappyPath();
        $mode = 'ABC';

        // Act and Assert
        $this->expectException(InvalidModeException::class);
        SBFileBuilder::make($filePath, $mode);
    }

    /**
     * @test
     *
     * @return void
     * @throws \Borzoni\SBFile\Components\SBFile\Exceptions\IOFileException
     * @throws \Borzoni\SBFile\Components\SBFile\Exceptions\InvalidModeException
     */
    public function createSBFile_InvalidFilePath_ExceptionThrown(): void
    {
        // Arrange
        $filePath = $this->getReadBadPath();

        // Act and Assert
        $this->expectException(IOFileException::class);
        SBFileBuilder::makeReadMode($filePath);
    }

    /**
     * @test
     *
     * @return void
     * @throws \Borzoni\SBFile\Components\SBFile\Exceptions\IOFileException
     * @throws \Borzoni\SBFile\Components\SBFile\Exceptions\InvalidModeException
     */
    public function createSBFile_DirectoryPath_ExceptionThrown(): void
    {
        // Arrange
        $filePath = $this->getRootDirPath();

        // Act and Assert
        $this->expectException(IOFileException::class);
        SBFileBuilder::makeReadMode($filePath);
    }
}
