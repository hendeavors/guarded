<?php

namespace Endeavors\Guarded;

use Closure;
use InvalidArgumentException;

final class GuardExtension
{
    public static function null($input, string $parametername, Closure $callback = null)
    {
        if (null === $input && null === $callback) {
            throw new InvalidArgumentException((string)$parametername);
        }

        if (null === $input) {
            $callback($input, $parametername);
        }
    }

    public static function empty($input, string $parametername, Closure $callback = null)
    {
        if (empty($input) && null === $callback) {
            throw new InvalidArgumentException((string)$parametername);
        }

        if (empty($input)) {
            $callback($input, $parametername);
        }
    }

    public static function whiteSpace(string $input, string $parametername, Closure $callback = null)
    {
        $hasWhiteSpace = ctype_space($input);

        if (true === $hasWhiteSpace && null === $callback) {
            throw new InvalidArgumentException((string)$parametername);
        }

        if (true === $hasWhiteSpace) {
            $callback($input, $parametername);
        }
    }

    public static function emptyOrWhiteSpace($input, string $parametername, Closure $callback = null)
    {
        static::empty($input, $parametername, $callback);

        if (is_string($input)) {
            static::whiteSpace($input, $parametername, $callback);
        }
    }

    /**
     * @see \Endeavors\Guarded\GuardExtension::emptyOrWhiteSpace
     */
    public static function whiteSpaceOrEmpty($input, string $parametername, Closure $callback = null)
    {
        static::emptyOrWhiteSpace($input, $parametername, $callback);
    }
}
