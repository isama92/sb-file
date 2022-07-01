<?php

namespace Tests\Unit\Components\SBFile;

use Tests\Helpers\Unit\Builders\Components\SBFile\SBFileBuilder;

class SBFileWriteUtTest extends SBFileUtTestCase
{
    /**
     * @test
     *
     * @return void
     * @throws \Borzoni\SBFile\Components\SBFile\Exceptions\IOFileException
     * @throws \Borzoni\SBFile\Components\SBFile\Exceptions\InvalidModeException
     */
    public function writeFile_HappyPath_BytesNumberReturned(): void
    {
        // Arrange
        $filePath = $this->getWriteHappyPath();
        $content = $this->getHappyContent();
        $expectedContentLength = strlen($content);

        // Act
        $sbFile = SBFileBuilder::makeWriteMode($filePath);
        $contentLength = $sbFile->write($content);

        // Assert
        $this->assertEquals($expectedContentLength, $contentLength);
    }
}
