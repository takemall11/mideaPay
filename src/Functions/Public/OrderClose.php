<?php

declare(strict_types=1);

namespace Media\Api\Functions\Public;

use Media\Api\Core\BaseClient;

/**
 * 关闭模块.
 */
class OrderClose extends BaseClient
{
    /**
     * 统一关闭订单.
     */
    public function closeOrder(array $params): array
    {
        return $this->curlRequest($params, 'post');
    }
}
