<?php

namespace Borzoni\SBFile\Components\SBFile\Exceptions;

use Exception;

abstract class BaseException extends Exception
{
    /**
     * @param string $message
     */
    public function __construct(string $message)
    {
        parent::__construct($message);
    }
}
