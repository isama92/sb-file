<?php

namespace Borzoni\SBFile\Components\SBFile\Exceptions;

class FileNotFoundException extends BaseException
{
    /**
     * @param string $path
     */
    public function __construct(string $path)
    {
        $msg = "File '{$path}' not found";
        parent::__construct($msg);
    }
}
