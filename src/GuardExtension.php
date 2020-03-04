<?php

namespace Endeavors\Guarded;

use Closure;
use InvalidArgumentException;
use Endeavors\Guarded\Guard;

final class GuardExtension
{
    public static function null($input, string $parametername)
    {
        if (null === $input) {
            throw new InvalidArgumentException((string)$parametername);
        }
    }

    public static function nullOrEmpty($input, string $parametername)
    {
        Guard::against()->null($input, $parametername);
        Guard::against()->empty($input, $parametername);
    }

    public static function empty($input, string $parametername)
    {
        if (empty($input)) {
            throw new InvalidArgumentException((string)$parametername);
        }
    }

    public static function whiteSpace(string $input, string $parametername)
    {
        $hasWhiteSpace = ctype_space($input);

        if (true === $hasWhiteSpace) {
            throw new InvalidArgumentException((string)$parametername);
        }
    }

    public static function emptyOrWhiteSpace($input, string $parametername)
    {
        Guard::against()->empty($input, $parametername);

        if (is_string($input)) {
            static::whiteSpace($input, $parametername);
        }
    }

    public static function zero($input, string $parametername)
    {
        if (0 === (int)$input) {
            throw new InvalidArgumentException((string)$parametername);
        }
    }

    /**
     * @see \Endeavors\Guarded\GuardExtension::emptyOrWhiteSpace
     */
    public static function whiteSpaceOrEmpty($input, string $parametername)
    {
        static::emptyOrWhiteSpace($input, $parametername);
    }
}
