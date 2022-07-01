<?php

namespace Tests\Helpers\Unit\Builders\Mocks;

use SplFileObject;

class SplFileObjectMockBuilder extends MockBuilder
{
    /**
     * @inheritdoc
     */
    public function setConcreteClassName(): void
    {
        $this->setClassName(SplFileObject::class);
    }
}
