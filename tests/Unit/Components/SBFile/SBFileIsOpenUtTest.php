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
        $sbFile = SBFileBuilder::makeReadMode($filePath);
        $isOpen = $sbFile->isOpen();

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
        $sbFile = SBFileBuilder::makeReadMode($filePath);
        $sbFile->close();
        $isOpen = $sbFile->isOpen();

        // Assert
        $this->assertFalse($isOpen);
    }
}
