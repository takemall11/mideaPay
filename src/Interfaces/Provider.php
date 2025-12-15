<?php

declare(strict_types=1);
/**
 * This file is part of MineAdmin.
 *
 * @link     https://www.mineadmin.com
 * @document https://doc.mineadmin.com
 * @contact  root@imoi.cn
 * @license  https://github.com/mineadmin/MineAdmin/blob/master/LICENSE
 */

namespace Media\Api\Interfaces;

use Media\Api\Core\Container;

/**
 * Interface Provider.
 */
interface Provider
{
    public function serviceProvider(Container $container): void;
}
