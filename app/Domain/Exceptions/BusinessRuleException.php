<?php

namespace App\Domain\Exceptions;

use Exception;

class BusinessRuleException extends Exception
{
    public function __construct(string $message, private int $status = 409)
    {
        parent::__construct($message);
    }

    public function render()
    {
        return response()->json(['message' => $this->getMessage()], $this->status);
    }
}
