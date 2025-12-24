<?php

declare(strict_types=1);

namespace Media\Api;

class ConfigProvider
{
    public function __invoke()
    {
        return [
            'annotations' => [
                'scan' => [
                    'paths' => [
                        __DIR__,
                    ],
                ],
            ],
            'commands' => [
            ],
            'publish' => [],
        ];
    }
}
