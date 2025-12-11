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

namespace Media\Api\Provider;

use Media\Api\Core\Container;
use Media\Api\Functions\Cashier\CashierPayShortcut;
use Media\Api\Interfaces\Provider;

/**
 * Class AlipayProvider.
 */
class CashierDeskPayProvider implements Provider
{
    /**
     * 服务提供者.
     */
    public function serviceProvider(Container $container): void
    {
        $container['cashier_app'] = static function ($container) {
            return new CashierPayShortcut($container, 'trade_pay_cashier');
        };
    }
}
