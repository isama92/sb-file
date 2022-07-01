<?php

namespace Tests\Unit\Components\SBFile;

use Tests\Helpers\Unit\Builders\Components\SBFile\SBFileBuilder;

class SBFileCloseUtTest extends SBFileUtTestCase
{
    /**
     * @test
     *
     * @return void
     * @throws \Borzoni\SBFile\Components\SBFile\Exceptions\IOFileException
     * @throws \Borzoni\SBFile\Components\SBFile\Exceptions\InvalidModeException
     */
    public function close_FhObjectDestroyed(): void
    {
        // Arrange
        $filePath = $this->getReadHappyPath();

        // Act
        $SBFile = SBFileBuilder::makeReadMode($filePath);
        $SBFile->close();

        $fh = $SBFile->getHandler();

        // Assert
        $this->assertNull($fh);
    }
}
