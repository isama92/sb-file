<?php

namespace Tests\Unit\Components\SBFile;

use Tests\Helpers\Unit\Builders\Components\SBFile\SBFileBuilder;

class SBFileReadUtTest extends SBFileUtTestCase
{
    /**
     * @test
     *
     * @return void
     * @throws \Borzoni\SBFile\Components\SBFile\Exceptions\IOFileException
     * @throws \Borzoni\SBFile\Components\SBFile\Exceptions\InvalidModeException
     */
    public function readFile_HappyPath_ContentReturned(): void
    {
        // Arrange
        $filePath = $this->getReadHappyPath();
        $expectedContent = $this->getHappyContent();

        // Act
        $SBFile = SBFileBuilder::makeReadMode($filePath);
        $content = $SBFile->read();

        // Assert
        $this->assertEquals($expectedContent, $content);
    }
}
