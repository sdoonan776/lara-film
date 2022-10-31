<?php

namespace App\Exceptions\Api;

use Exception;
use Illuminate\Support\Facades\Log;

class TmdbException extends Exception
{
    protected $message;

    public function __construct($message) {
        $this->message = $message;
    }

    public function report()
    {
        Log::error($this->message);
    }

}
