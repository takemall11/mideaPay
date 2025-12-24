<?php

declare(strict_types=1);

namespace Media\Api\Core;

/**
 * Class ContainerBase.
 */
class ContainerBase extends Container
{
    public string $mchId = '';

    public string $service = '';

    public array $baseParams = [
        'input_charset' => 'UTF-8',
        'sign_type' => 'MD5_RSA_TW',
    ];

    protected array $provider = [];

    /**
     * ContainerBase constructor.
     */
    public function __construct(array $params = [])
    {
        if (! empty($params)) {
            $this->baseParams = $params;
        }

        $providerCallback = function ($provider) {
            $obj = new $provider();
            $this->serviceRegister($obj);
        };

        array_walk($this->provider, $providerCallback); // 注册
    }

    /**
     * @param mixed $id
     * @return mixed
     */
    public function __get($id)
    {
        return $this->offsetGet($id);
    }

    /**
     * @return ContainerBase
     */
    public function setMchId(string $mchId): static
    {
        $this->mchId = $mchId;
        return $this;
    }
}
