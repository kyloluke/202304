<?php

namespace Services\Lp3Ship\App\Exceptions;

use Exception;
use Services\Lp3Ship\App\Http\Requests\Request;

class ShipScheduleSaveException extends Exception
{
    public function __construct(string $message, int $code = 500)
    {
        parent::__construct($message, $code);
    }

    public function render(Request $request)
    {
        return response()->json(['msg' => $this->message], $this->code);
    }
}
