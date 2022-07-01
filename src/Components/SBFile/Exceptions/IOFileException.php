<?php

namespace Borzoni\SBFile\Components\SBFile\Exceptions;

class IOFileException extends BaseException
{
    /**
     * @param string $path
     * @param string $action
     */
    public function __construct(string $path, string $action)
    {
        $msg = "File IO error '{$path}': {$action}";
        parent::__construct($msg);
    }
}
