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

namespace Media\Api\Functions\Public;

use GuzzleHttp\Exception\GuzzleException;
use Media\Api\Core\BaseClient;

/**
 * 退款模块.
 */
class OrderRefund extends BaseClient
{
    /**
     * 统一退款.
     * @throws GuzzleException
     */
    public function refund(array $params): array
    {
        $this->app->baseParams['version'] = '3.1.2';
        return $this->curlRequest($params, 'post');
    }
}
