<?php

namespace Tests\Unit\Components\SBFile;

use Tests\Helpers\Common\Traits\VfsTrait;
use Tests\Unit\Components\ComponentsUtTestCase;

abstract class SBFileUtTestCase extends ComponentsUtTestCase
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
