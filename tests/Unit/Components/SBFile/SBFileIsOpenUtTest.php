<?php

namespace Tests\Unit\Components\SBFile;

use Tests\Helpers\Unit\Builders\Components\SBFile\SBFileBuilder;

class SBFileIsOpenUtTest extends SBFileUtTestCase
{
    /**
     * @test
     *
     * @return void
     * @throws \Borzoni\SBFile\Components\SBFile\Exceptions\IOFileException
     * @throws \Borzoni\SBFile\Components\SBFile\Exceptions\InvalidModeException
     */
    public function isOpen_WithFhSet_ReturnsTrue(): void
    {
        // Arrange
        $filePath = $this->getReadHappyPath();

        // Act
        $SBFile = SBFileBuilder::makeReadMode($filePath);
        $isOpen = $SBFile->isOpen();

        // Assert
        $this->assertTrue($isOpen);
    }

    /**
     * @test
     *
     * @return void
     * @throws \Borzoni\SBFile\Components\SBFile\Exceptions\IOFileException
     * @throws \Borzoni\SBFile\Components\SBFile\Exceptions\InvalidModeException
     */
    public function isOpen_WithFhUnset_ReturnsFalse(): void
    {
        // Arrange
        $filePath = $this->getReadHappyPath();

        // Act
        $SBFile = SBFileBuilder::makeReadMode($filePath);
        $SBFile->close();
        $isOpen = $SBFile->isOpen();

        // Assert
        $this->assertFalse($isOpen);
    }
}
