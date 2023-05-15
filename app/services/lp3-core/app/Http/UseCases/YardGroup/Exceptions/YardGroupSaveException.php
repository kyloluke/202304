<?php

namespace Services\Lp3Core\App\Http\UseCases\YardGroup\Exceptions;

use Exception;

/**
 * ヤードグループの作成/更新に関する共通の例外
 */
class YardGroupSaveException extends Exception
{
    const START_DATE_ERROR = "incorrectStartDateError";
    const END_DATE_ERROR = "emptyEndDateError";

    public function __construct($message)
    {
        parent::__construct($message);
    }
}
