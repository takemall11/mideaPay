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

namespace Media\Api\Core;

/**
 * Class Container.
 */
class Container implements \ArrayAccess
{
    private array $instances = [];

    private array $values = [];

    /**
     * @param mixed $provider
     * @return $this
     */
    public function serviceRegister($provider): self
    {
        $provider->serviceProvider($this);
        return $this;
    }

    public function offsetGet(mixed $offset): mixed
    {
        if (isset($this->instances[$offset])) {
            return $this->instances[$offset];
        }
        $raw = $this->values[$offset];
        $val = $this->values[$offset] = $raw($this);
        $this->instances[$offset] = $val;
        return $val;
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
        $this->values[$offset] = $value;
    }

    public function offsetUnset(mixed $offset): void {}

    public function offsetExists($offset): bool
    {
        return ! empty($this->values[$offset]);
    }
}
