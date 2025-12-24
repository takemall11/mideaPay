<?php

declare(strict_types=1);

namespace Media\Api\Interfaces;

interface Params
{
    /**
     * PUBLIC属性转数组.
     */
    public function build(): array;
}
