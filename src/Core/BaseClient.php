<?php

declare(strict_types=1);

namespace Media\Api\Core;

use GuzzleHttp\Exception\GuzzleException;
use Media\Api\Tools\Guzzle;
use Media\Api\Tools\Sign;

use function Hyperf\Config\config;
use function Hyperf\Support\make;

/**
 * Class BaseClient.
 * @property BaseClient app
 */
class BaseClient
{
    use Sign;

    public string $host = 'https://in.mideaepay.com';

    public string $url = '/gateway.htm';

    public string $service = '';

    protected Container $app;

    /**
     * BaseClient constructor.
     */
    public function __construct(Container $app, string $service)
    {
        $payApp = config('pay.mideapay.env');
        $this->app = $app;
        $this->service = $service;
        $this->host = $payApp !== 'prod' ? 'https://in.mideaepayuat.com' : 'https://in.mideaepay.com';
    }

    /**
     * @throws GuzzleException
     */
    public function getToken(string $time, string $imei, string $loginName): string
    {
        $this->service = 'auth_token';
        $this->app->baseParams['version'] = '3.0.0';

        $params = [
            'terminal_type' => 'MOBILE',
            'login_name' => $loginName,
            'token_time' => $time,
            'ip' => getClientIp(),
            'session_id' => $imei,
        ];

        $result = $this->curlRequest($params, 'post');

        return $result['token'] ?? '';
    }

    /**
     * curl 请求
     * @throws GuzzleException
     */
    public function curlRequest(array $data, string $method = 'get', int $timeout = 10): array
    {
        # # 公共参数
        $publicParams = [
            'partner' => $this->app->mchId,
            'service' => $this->service,
            'req_seq_no' => uniqid(),
        ];
        # # 合并公共参数
        $data = array_merge($data, $publicParams, $this->app->baseParams);

        # # 加密内容
        $data['sign'] = self::getSign($data);

        # # 开始请求
        /** @var Guzzle $client */
        $client = make(Guzzle::class);
        # # 设置请求参数
        $client->setHttpHandle(
            [
                'base_uri' => $this->host,
                'timeout' => $timeout,
                'verify' => false,
            ]
        );

        $method = 'send' . ucfirst($method);

        return $client->{$method}($this->url, $data);
    }
}
