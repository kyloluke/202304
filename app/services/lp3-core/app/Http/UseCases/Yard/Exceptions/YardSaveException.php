<?php

namespace Services\Lp3Core\App\Http\UseCases\Yard\Exceptions;

use Exception;

/**
 * ヤードの作成/更新に関する例外処理
 */
class YardSaveException extends Exception
{
    const CHANGE_BELONGING_TO_ERROR = "changeBelongingToError";
    const INACTIVE_REPRESENTATIVE_YARD_ERROR = "inactiveRepresentativeYardError";

    public function __construct($message)
    {
        $this->message = $message;
    }
}
