<?php

namespace Endeavors\Guarded;

use Endeavors\Guarded\GuardInterface;
use Endeavors\Guarded\GuardExtension;
use Throwable;
use InvalidArgumentException;

class Guard implements GuardInterface
{
    /**
     * @return \Endeavors\Guarded\Guard
     */
    public static function against()
    {
        return new Guard;
    }

    private function __construct()
    {
    }

    public function __call($method, $args)
    {
        try {
            GuardExtension::$method(...$args);
        } catch (Throwable $e) {
            // Call to undefined method
            if (false === strpos($e->getMessage(), "Call to undefined method")) {
                throw $e;
            }

            throw new \BadMethodCallException($e->getMessage());
        }
    }
}
