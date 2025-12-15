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

namespace Media\Api\Exception;

use Hyperf\Server\Exception\ServerException;
use Media\Api\Constants\MediaErrorCode;

class PayException extends ServerException
{
    public function __construct(int $code = 0, ?string $message = null, ?\Throwable $previous = null)
    {
        if ($message === null) {
            $message = MediaErrorCode::getMessage($code);
        }

        parent::__construct($message, $code, $previous);
    }
}
