<?php

declare(strict_types=1);

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
