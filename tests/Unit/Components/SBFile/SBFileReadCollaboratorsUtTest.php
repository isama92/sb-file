<?php

namespace Tests\Unit\Components\SBFile;

use Borzoni\SBFile\Components\SBFile\SBFile;
use Borzoni\SBFile\Components\SBFile\Exceptions\IOFileException;
use Tests\Helpers\Unit\Builders\Components\SBFile\SBFileBuilder;
use Tests\Helpers\Unit\Builders\Mocks\SplFileObjectMockBuilder;

class SBFileReadCollaboratorsUtTest extends SBFileMockeryTestCase
{
    /**
     * @test
     *
     * @return void
     * @throws \Borzoni\SBFile\Components\SBFile\Exceptions\IOFileException
     * @throws \Borzoni\SBFile\Components\SBFile\Exceptions\InvalidModeException
     */
    public function objectsCollaboration_ReadFromHappyPath_ContentReturned(): void
    {
        // Arrange
        $filePath = $this->getReadHappyPath();
        $mode = SBFile::MODE_R;
        $expectedContent = $this->getHappyContent();
        $expectedContentLength = strlen($expectedContent);

        // Collaboration
        $mock = (new SplFileObjectMockBuilder())->make([$filePath, $mode]);
        $mock->shouldReceive('getSize')
            ->once()
            ->withNoArgs()
            ->andReturn($expectedContentLength);
        $mock->shouldReceive('fread')
            ->once()
            ->with($expectedContentLength)
            ->andReturn($expectedContent);

        // Act
        $sbFile = SBFileBuilder::makeWithFakeCollaborator($filePath, $mode, $mock);
        $content = $sbFile->read();

        // Assert
        $this->assertEquals($expectedContent, $content);
    }

    /**
     * @test
     *
     * @return void
     * @throws \Borzoni\SBFile\Components\SBFile\Exceptions\IOFileException
     * @throws \Borzoni\SBFile\Components\SBFile\Exceptions\InvalidModeException
     */
    public function objectsCollaboration_CannotGetFileSize_ExceptionThrown(): void
    {
        // Arrange
        $filePath = $this->getReadHappyPath();
        $mode = SBFile::MODE_R;
        $expectedContentLength = false;

        // Collaboration
        $mock = (new SplFileObjectMockBuilder())->make([$filePath, $mode]);
        $mock->shouldReceive('getSize')
            ->once()
            ->withNoArgs()
            ->andReturn($expectedContentLength);

        // Act and Assert
        $sbFile = SBFileBuilder::makeWithFakeCollaborator($filePath, $mode, $mock);

        $this->expectException(IOFileException::class);
        $sbFile->read();
    }

    /**
     * @test
     *
     * @return void
     * @throws \Borzoni\SBFile\Components\SBFile\Exceptions\IOFileException
     * @throws \Borzoni\SBFile\Components\SBFile\Exceptions\InvalidModeException
     */
    public function objectsCollaboration_CannotGetFileContent_ExceptionThrown(): void
    {
        // Arrange
        $filePath = $this->getReadHappyPath();
        $mode = SBFile::MODE_R;
        $expectedContent = false;
        $expectedContentLength = 0;

        // Collaboration
        $mock = (new SplFileObjectMockBuilder())->make([$filePath, $mode]);
        $mock->shouldReceive('getSize')
            ->once()
            ->withNoArgs()
            ->andReturn($expectedContentLength);
        $mock->shouldReceive('fread')
            ->once()
            ->with($expectedContentLength)
            ->andReturn($expectedContent);

        // Act and Assert
        $sbFile = SBFileBuilder::makeWithFakeCollaborator($filePath, $mode, $mock);

        $this->expectException(IOFileException::class);
        $sbFile->read();
    }
}
