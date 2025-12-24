<?php

declare(strict_types=1);

namespace Media\Api\Provider;

use Media\Api\Core\Container;
use Media\Api\Functions\Wechat\WechatPayShortcut;
use Media\Api\Interfaces\Provider;

/**
 * Class WechatPayProvider.
 */
class WechatPayProvider implements Provider
{
    /**
     * 服务提供者.
     */
    public function serviceProvider(Container $container): void
    {
        $container['wechat_mini'] = static function ($container) {
            return new WechatPayShortcut($container, 'trade_pay_wechatpay');
        };
    }
}
