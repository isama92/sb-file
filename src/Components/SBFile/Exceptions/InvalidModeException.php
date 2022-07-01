<?php

namespace Borzoni\SBFile\Components\SBFile\Exceptions;

class InvalidModeException extends BaseException
{
    /**
     * @param string $mode
     */
    public function __construct(string $mode)
    {
        $msg = "Mode {$mode} is invalid";
        parent::__construct($msg);
    }
}
