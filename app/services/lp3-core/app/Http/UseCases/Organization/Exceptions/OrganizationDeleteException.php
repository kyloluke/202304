<?php

namespace Services\Lp3Core\App\Http\UseCases\Organization\Exceptions;

use Exception;

class OrganizationDeleteException extends Exception
{
    const IN_USE = "inUse";

    public function __construct($message)
    {
        parent::__construct($message);
    }
}
