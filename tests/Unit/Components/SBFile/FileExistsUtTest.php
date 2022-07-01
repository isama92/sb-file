<?php

namespace Tests\Unit\Components\SBFile;

use Borzoni\SBFile\Components\SBFile\SBFile;
use Borzoni\SBFile\Components\SBFile\Exceptions\FileNotFoundException;

class FileExistsUtTest extends SBFileUtTestCase
{
    /**
     * @test
     *
     * @return void
     *
     * @throws \Borzoni\SBFile\Components\SBFile\Exceptions\FileNotFoundException
     */
    public function checkFileExists_happyPath_TrueReturned(): void
    {
        // Arrange
        $filePath = $this->getReadHappyPath();

        // Act
        $exists = SBFile::fileExists($filePath);

        // Assert
        $this->assertTrue($exists);
    }

    /**
     * @test
     *
     * @return void
     *
     * @throws \Borzoni\SBFile\Components\SBFile\Exceptions\FileNotFoundException
     */
    public function checkFileExists_BadPath_FalseReturned(): void
    {
        // Arrange
        $filePath = $this->getReadBadPath();

        // Act
        $exists = SBFile::fileExists($filePath);

        // Assert
        $this->assertFalse($exists);
    }

    /**
     * @test
     *
     * @return void
     *
     * @throws \Borzoni\SBFile\Components\SBFile\Exceptions\FileNotFoundException
     */
    public function checkFileExists_BadPathWithThrows_ExceptionThrown(): void
    {
        // Arrange
        $filePath = $this->getReadBadPath();

        // Act and Assert
        $this->expectException(FileNotFoundException::class);
        SBFile::fileExists($filePath, true);
    }
}
