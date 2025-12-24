<?php

declare(strict_types=1);

namespace Media\Api\Functions\Public;

use GuzzleHttp\Exception\GuzzleException;
use Media\Api\Core\BaseClient;

/**
 * 订单模块.
 */
class OrderDetail extends BaseClient
{
    /**
     * 统一查询订单.
     * @throws GuzzleException
     */
    public function getInfo(array $params): array
    {
        $this->app->baseParams['version'] = '3.4.0';
        return $this->curlRequest($params, 'post');
    }
}
