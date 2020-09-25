<?php

declare(strict_types=1);

namespace Waglpz\Config;

use MonologFactory\LoggerFactory;
use Psr\Log\LoggerInterface;

if (! \function_exists('Waglpz\Config\logger')) {
    /** @param array<mixed> $config */
    function logger(array $config, string|null $name = null): LoggerInterface
    {
        if ($config === []) {
            throw new \InvalidArgumentException('Empty logger factory config provided.');
        }

        static $logger = [];

        $name ??= 'default';

        if (! isset($logger[$name]) && \is_array($config[$name])) {
            $logger[$name] = (new LoggerFactory())->create($name, $config[$name]);
        }

        if (! isset($logger[$name]) || ! $logger[$name] instanceof LoggerInterface) {
            throw new \Error('Logger factory can not build Logger instance.');
        }

        return $logger[$name];
    }
}

if (! \function_exists('Waglpz\Config\config')) {
    function config(string|null $partial = null, string|null $projectRoot = null): mixed
    {
        $projectRoot = \Waglpz\Config\projectRoot($projectRoot);
        $config      = include $projectRoot . '/main.php';

        if ($partial !== null && ! isset($config[$partial])) {
            throw new \InvalidArgumentException(
                \sprintf(
                    'Unknown config key given "%s".',
                    $partial,
                ),
            );
        }

        return $partial !== null ? $config[$partial] : $config;
    }
}

if (! \function_exists('Waglpz\Config\projectRoot')) {
    function projectRoot(string|null $projectRoot = null): string
    {
        if ($projectRoot === null) {
            \assert(\defined('PROJECT_CONFIG_DIRECTORY'));

            return \PROJECT_CONFIG_DIRECTORY;
        }

        return $projectRoot;
    }
}
