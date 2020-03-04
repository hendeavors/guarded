<?php

namespace Endeavors\Guarded;

use PHPUnit\Framework\TestCase;
use Endeavors\Guarded\Guard;
use InvalidArgumentException;
use BadMethodCallException;

class GuardTest extends TestCase
{
    /**
     * @test
     */
    public function guardsNull()
    {
        $value = null;

        $this->expectException(InvalidArgumentException::class);

        Guard::against()->null($value, 'value');
    }

    /**
     * @test
     */
    public function guardsEmpty()
    {
        $value = '';

        $this->expectException(InvalidArgumentException::class);

        Guard::against()->empty($value, 'value');
    }

    /**
     * @test
     */
    public function guardsOnlySingleQuotedWhiteSpace()
    {
        $value = '    ';

        $this->expectException(InvalidArgumentException::class);

        Guard::against()->whiteSpace($value, 'value');
    }

    /**
     * @test
     */
    public function guardsOnlyDoubleQuotedWhiteSpace()
    {
        $value = "    ";

        $this->expectException(InvalidArgumentException::class);

        Guard::against()->whiteSpace($value, 'value');
    }

    /**
     * @test
     */
    public function guardsEmptyOrWhiteSpace()
    {
        $value = "    ";

        $this->expectException(InvalidArgumentException::class);

        Guard::against()->emptyOrWhiteSpace($value, 'value');
    }

    /**
     * @test
     */
    public function guardsWhiteSpaceOrEmpty()
    {
        $value = "";

        $this->expectException(InvalidArgumentException::class);

        Guard::against()->emptyOrWhiteSpace($value, 'value');
    }

    /**
     * @test
     */
    public function guardsEmptyOrWhiteSpaceAlias()
    {
        $value = "    ";

        $this->expectException(InvalidArgumentException::class);

        Guard::against()->whiteSpaceOrEmpty($value, 'value');
    }

    /**
     * @test
     */
    public function guardsZero()
    {
        $value = 0;

        $this->expectException(InvalidArgumentException::class);

        Guard::against()->zero($value, 'value');
    }

    /**
     * @test
     */
    public function guardsWhiteSpaceOrEmptyAlias()
    {
        $value = "";

        $this->expectException(InvalidArgumentException::class);

        Guard::against()->whiteSpaceOrEmpty($value, 'value');
    }

    /**
     * @test
     */
    public function badMethodCall()
    {
        $this->expectException(BadMethodCallException::class);

        Guard::against()->fooBarBaz('foo', 'barbaz');
    }
}
