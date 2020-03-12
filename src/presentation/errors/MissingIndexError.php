<?php

namespace KW13\presentation\errors;

use Exception;

class MissingIndexError extends Exception
{
    public function __construct(string $indexName)
    {
        parent::__construct("Missing index error: {$indexName}", 500);
    }
}
