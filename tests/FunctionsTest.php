<?php

declare(strict_types=1);

namespace Waglpz\Webapp\Tests;

use PHPUnit\Framework\MockObject\Exception;
use PHPUnit\Framework\TestCase;

use function Waglpz\Config\logger;

final class FunctionsTest extends TestCase
{
    /**
     * @throws Exception
     * @throws \JsonException
     * @throws Exception
     *
     * @test
     */
    public function loggerThrowsException(): void
    {
        $config = [];

        $this->expectExceptionMessage('Empty logger factory config provided.');
        $this->expectException(\InvalidArgumentException::class);
        $logger = logger($config, 'test-log');

        $this->expectExceptionMessage('Empty logger factory config provided.');
        $this->expectException(\InvalidArgumentException::class);
        $logger = logger($config, 'test-log');
    }
}
