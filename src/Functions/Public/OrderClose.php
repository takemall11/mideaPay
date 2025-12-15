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
