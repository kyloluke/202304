<?php

namespace Services\Lp3Core\App\Http\UseCases\YardGroup\Exceptions;

use Exception;

/**
 * ヤードグループ削除に関する例外処理
 */
class YardGroupDeleteException extends Exception
{
    const HAS_ACTIVE_YARD_ERROR = 'hasActiveYardError';

    public function __construct($message)
    {
        parent::__construct($message);
    }
}
