<?php

namespace Tests\Unit\Components\SBFile;

use Borzoni\SBFile\Components\SBFile\SBFile;
use Borzoni\SBFile\Components\SBFile\Exceptions\IOFileException;
use Tests\Helpers\Unit\Builders\Components\SBFile\SBFileBuilder;
use Tests\Helpers\Unit\Builders\Mocks\SplFileObjectMockBuilder;

class SBFileWriteCollaboratorsUtTest extends SBFileMockeryTestCase
{
    /**
     * @test
     *
     * @return void
     * @throws \Borzoni\SBFile\Components\SBFile\Exceptions\IOFileException
     * @throws \Borzoni\SBFile\Components\SBFile\Exceptions\InvalidModeException
     */
    public function objectsCollaboration_WriteToHappyPath_BytesNumberReturned(): void
    {
        // Arrange
        $filePath = $this->getWriteHappyPath();
        $mode = SBFile::MODE_W;
        $content = $this->getHappyContent();
        $expectedContentLength = strlen($content);

        // Collaboration
        $mock = (new SplFileObjectMockBuilder())->make([$filePath, $mode]);
        $mock->shouldReceive('fwrite')
            ->once()
            ->with($content)
            ->andReturn($expectedContentLength);

        // Act
        $SBFile = SBFileBuilder::makeWithFakeCollaborator($filePath, $mode, $mock);
        $contentLength = $SBFile->write($content);

        // Assert
        $this->assertEquals($expectedContentLength, $contentLength);
    }

    /**
     * @test
     *
     * @return void
     * @throws \Borzoni\SBFile\Components\SBFile\Exceptions\IOFileException
     * @throws \Borzoni\SBFile\Components\SBFile\Exceptions\InvalidModeException
     */
    public function objectsCollaboration_FailsToWrite_ExceptionThrown(): void
    {
        // Arrange
        $filePath = $this->getWriteHappyPath();
        $mode = SBFile::MODE_W;
        $content = $this->getHappyContent();
        $expectedContentLength = false;

        // Collaboration
        $mock = (new SplFileObjectMockBuilder())->make([$filePath, $mode]);
        $mock->shouldReceive('fwrite')
            ->once()
            ->with($content)
            ->andReturn($expectedContentLength);

        // Act
        $SBFile = SBFileBuilder::makeWithFakeCollaborator($filePath, $mode, $mock);
        $this->expectException(IOFileException::class);
        $SBFile->write($content);
    }
}
