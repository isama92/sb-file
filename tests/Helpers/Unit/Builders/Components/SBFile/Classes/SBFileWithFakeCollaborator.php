<?php

namespace Tests\Helpers\Unit\Builders\Components\SBFile\Classes;

use Borzoni\SBFile\Components\SBFile\SBFile;
use SplFileObject;

class SBFileWithFakeCollaborator extends SBFile
{
    /**
     * @var \SplFileObject
     */
    public $fakeFh;

    public function __construct(string $filePath, string $mode, SplFileObject $splFileObjectMock)
    {
        $this->fakeFh = $splFileObjectMock;
        parent::__construct($filePath, $mode);
    }

    public function createSplFileObject(string $filePath, string $mode): SplFileObject
    {
        return $this->fakeFh;
    }
}
