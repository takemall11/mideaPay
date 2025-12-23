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

namespace Media\Api\Tools;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\HandlerStack;
use Hyperf\Codec\Json;
use Hyperf\Guzzle\CoroutineHandler;
use Media\Api\Constants\MediaErrorCode;
use Media\Api\Exception\PayException;
use Psr\Http\Message\ResponseInterface;

class Guzzle
{
    protected array $headers = [
        'Content-Type' => 'application/x-www-form-urlencoded',
    ];

    private Client $client;

    /**
     * @return $this
     */
    public function setHttpHandle(array $options = []): static
    {
        $options['handler'] = HandlerStack::create(new CoroutineHandler());

        $options['headers'] = $this->headers;

        $this->client = new Client($options);

        return $this;
    }

    /**
     * @throws GuzzleException
     */
    public function sendGet(string $url, array $params): array
    {
        $result = $this->client->get($url, ['query' => $params]);

        return $this->getResult($result);
    }

    /**
     * @throws GuzzleException
     */
    public function sendPost(string $url, array $params): array
    {
        $result = $this->client->post($url, ['form_params' => $params]);

        return $this->getResult($result);
    }

    private function getResult(ResponseInterface $response): array
    {
        $result = $response->getBody()->getContents();

        $statusCode = $response->getStatusCode();

        if (str_contains($result, '{"') && str_contains($result, '"}')) {
            $result = Json::decode($result);

            if (empty($result) || $statusCode !== 200) {
                throw new PayException(MediaErrorCode::ORDER_SERVICE_ERROR, '请求美的支付服务错误');
            }

            if ($result['result_code'] !== '1001') {
                throw new PayException(MediaErrorCode::PAY_POST_ERROR, ! empty($result['result_info']) && \is_string($result['result_info']) ? $result['result_info'] : null);
            }
        } else {
            return ['result' => $result];
        }

        return $result;
    }
}
