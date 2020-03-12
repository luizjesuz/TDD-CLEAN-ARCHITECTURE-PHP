<?php

namespace KW13\presentation\errors;

use Exception;

class InvalidParamError extends Exception
{
    public function __construct(string $paramName)
    {
        parent::__construct("Invalid param error: {$paramName}", 400);
    }
}
