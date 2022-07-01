<?php

namespace Borzoni\SBFile\Components\SBFile;

use SplFileObject;

interface FileInterface
{
    public const MODE_R = 'r';
    public const MODE_RP = 'r+';
    public const MODE_W = 'w';
    public const MODE_WP = 'w+';
    public const MODE_A = 'a';
    public const MODE_AP = 'a+';
    public const MODE_X = 'x';
    public const MODE_XP = 'x+';
    public const MODE_C = 'c';
    public const MODE_CP = 'c+';
    public const MODE_E = 'e';

    public const MODES = [
        self::MODE_R,self::MODE_RP,self::MODE_W,self::MODE_WP,
        self::MODE_A,self::MODE_AP,self::MODE_X,self::MODE_XP,
        self::MODE_C,self::MODE_CP,self::MODE_E,
    ];

    /**
     * @return \SplFileObject|null
     */
    public function getHandler(): ?SplFileObject;

    /**
     * @param string $filePath
     * @param bool   $throwOnFalse
     *
     * @return bool
     */
    public static function fileExists(string $filePath, bool $throwOnFalse = false): bool;

    /**
     * @return bool
     */
    public function isOpen(): bool;

    /**
     * @return void
     */
    public function close(): void;

    /**
     * @param string $data
     *
     * @return int The number of bytes written
     */
    public function write(string $data): int;

    /**
     * @return string
     */
    public function read(): string;
}
