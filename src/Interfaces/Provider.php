<?php

declare(strict_types=1);

namespace Media\Api\Interfaces;

use Media\Api\Core\Container;

/**
 * Interface Provider.
 */
interface Provider
{
    public function serviceProvider(Container $container): void;
}
