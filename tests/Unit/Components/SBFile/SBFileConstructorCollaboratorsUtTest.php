<?php

namespace Tests\Unit\Components\SBFile;

use Borzoni\SBFile\Components\SBFile\SBFile;
use Tests\Helpers\Unit\Builders\Components\SBFile\SBFileBuilder;
use Tests\Helpers\Unit\Builders\Mocks\SplFileObjectMockBuilder;

class SBFileConstructorCollaboratorsUtTest extends SBFileMockeryTestCase
{
    /**
     * @test
     *
     * @return void
     * @throws \Borzoni\SBFile\Components\SBFile\Exceptions\IOFileException
     * @throws \Borzoni\SBFile\Components\SBFile\Exceptions\InvalidModeException
     */
    public function objectsCollaboration_ObjectCreated(): void
    {
        // Arrange
        $filePath = $this->getReadHappyPath();
        $mode = SBFile::MODE_R;

        // Collaboration
        $mock = (new SplFileObjectMockBuilder())->make([$filePath, $mode]);

        // Act
        SBFileBuilder::makeWithFakeCollaborator($filePath, $mode, $mock);

        // Assert
        $this->assertTrue(true);
    }
}
