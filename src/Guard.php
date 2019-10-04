<?php

namespace Endeavors\Guarded;

use Endeavors\Guarded\GuardInterface;
use Endeavors\Guarded\GuardExtension;

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
        GuardExtension::$method(...$args);
    }
}
