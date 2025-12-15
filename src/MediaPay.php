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

namespace Media\Api;

use Media\Api\Core\ContainerBase;
use Media\Api\Provider\CashierDeskPayProvider;
use Media\Api\Provider\SearchProvider;
use Media\Api\Provider\WechatPayProvider;

/**
 * Class Application.
 */
class MediaPay extends ContainerBase
{
    /**
     * 服务提供者.
     */
    protected array $provider = [
        SearchProvider::class,
        CashierDeskPayProvider::class,
        WechatPayProvider::class,
        // ...其他服务提供者
    ];
}
