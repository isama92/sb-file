<?php

namespace Tests\Unit\Components\SBFile;

use Borzoni\SBFile\Components\SBFile\SBFile;
use Borzoni\SBFile\Components\SBFile\Exceptions\InvalidModeException;
use Tests\Helpers\Unit\Builders\Components\SBFile\SBFileBuilder;

class SBFileSetModeUtTest extends SBFileUtTestCase
{
    /**
     * @test
     *
     * @return void
     * @throws \Borzoni\SBFile\Components\SBFile\Exceptions\IOFileException
     * @throws \Borzoni\SBFile\Components\SBFile\Exceptions\InvalidModeException
     */
    public function setMode_WithValidMode_SBFileCreated(): void
    {
        // Arrange
        $filePath = $this->getReadHappyPath();
        $mode = SBFile::MODE_R;

        // Act
        SBFileBuilder::make($filePath, $mode);

        // Assert
        $this->assertTrue(true);
    }

    /**
     * @test
     *
     * @return void
     * @throws \Borzoni\SBFile\Components\SBFile\Exceptions\IOFileException
     * @throws \Borzoni\SBFile\Components\SBFile\Exceptions\InvalidModeException
     */
    public function setMode_WithInvalidMode_ExceptionThrown(): void
    {
        // Arrange
        $filePath = $this->getReadHappyPath();
        $mode = 'ABC';

        // Act and Assert
        $this->expectException(InvalidModeException::class);
        SBFileBuilder::make($filePath, $mode);
    }
}
