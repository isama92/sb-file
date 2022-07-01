<?php

namespace Tests\Unit\Components\SBFile;

use Tests\Helpers\Common\Traits\VfsTrait;
use Tests\Unit\Components\ComponentsMockeryTestCase;

abstract class SBFileMockeryTestCase extends ComponentsMockeryTestCase
{
    use VfsTrait;

    /**
     * @inheritdoc
     */
    protected function setUp(): void
    {
        $this->initVfs();
    }
}
