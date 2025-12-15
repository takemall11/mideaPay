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
use Media\Api\Functions\Public\OrderDetail;
use Media\Api\Functions\Public\OrderRefund;
use Media\Api\Interfaces\Provider;

/**
 * Class AlipayProvider.
 */
class SearchProvider implements Provider
{
    /**
     * 服务提供者.
     */
    public function serviceProvider(Container $container): void
    {
        $container['search'] = static function ($container) {
            return new OrderDetail($container, 'trade_query');
        };
        $container['refund'] = static function ($container) {
            return new OrderRefund($container, 'trade_refund');
        };
    }
}
