<?php

namespace KW13\presentation\errors;

use Exception;

class MissingParamError extends Exception
{
    public function __construct(string $paramName)
    {
        parent::__construct("Missing param error: {$paramName}", 400);
    }
}
