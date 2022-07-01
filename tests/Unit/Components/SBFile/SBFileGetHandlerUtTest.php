<?php

namespace Tests\Unit\Components\SBFile;

use SplFileObject;
use Tests\Helpers\Unit\Builders\Components\SBFile\SBFileBuilder;

class SBFileGetHandlerUtTest extends SBFileUtTestCase
{
    /**
     * @test
     *
     * @return void
     * @throws \Borzoni\SBFile\Components\SBFile\Exceptions\IOFileException
     * @throws \Borzoni\SBFile\Components\SBFile\Exceptions\InvalidModeException
     */
    public function getHandler_WithFhSet_SplFileObjectInstanceReturned(): void
    {
        // Arrange
        $filePath = $this->getReadHappyPath();

        // Act
        $sbFile = SBFileBuilder::makeReadMode($filePath);
        $fh = $sbFile->getHandler();

        // Assert
        $this->assertInstanceOf(SplFileObject::class, $fh);
    }

    /**
     * @test
     *
     * @return void
     * @throws \Borzoni\SBFile\Components\SBFile\Exceptions\IOFileException
     * @throws \Borzoni\SBFile\Components\SBFile\Exceptions\InvalidModeException
     */
    public function getHandler_WithFhUnset_EmptyReturned(): void
    {
        // Arrange
        $filePath = $this->getReadHappyPath();

        // Act
        $sbFile = SBFileBuilder::makeReadMode($filePath);
        $sbFile->close();
        $fh = $sbFile->getHandler();

        // Assert
        $this->assertEmpty($fh);
    }
}
