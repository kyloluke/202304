<?php

namespace Services\Lp3Core\App\Http\UseCases\Yard\Exceptions;

use Exception;

/**
 * ヤードの削除に関する例外処理
 */
class YardDeleteException extends Exception
{
    const DELETE_USED_YARD_ERROR = 'deleteUsedYardError';

    public function __construct($message)
    {
        $this->message = $message;
    }
}
