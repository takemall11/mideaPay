<?php

declare(strict_types=1);

namespace Media\Api\Functions\Wechat;

use GuzzleHttp\Exception\GuzzleException;
use Media\Api\Core\BaseClient;

/**
 * 订单模块.
 */
class WechatPayShortcut extends BaseClient
{
    /**
     * 创建订单.
     * @throws GuzzleException
     */
    public function createOrder(array $params): array
    {
        // 请求token
        $imei = uniqid();
        $time = date('YmdHis');
        $params['payer_login_name'] = '13112255249';
        $params['token'] = $this->getToken($time, $imei, $params['payer_login_name']);
        $params['token_time'] = $time;
        $params['terminal_type'] = 'MOBILE';
        $params['session_id'] = $imei;
        $this->service = 'trade_pay_wechatpay';
        $this->app->baseParams['version'] = '3.7.0';

        return $this->curlRequest($params, 'post');
    }
}
