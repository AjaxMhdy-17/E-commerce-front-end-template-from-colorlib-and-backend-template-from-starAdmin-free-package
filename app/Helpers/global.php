<?php

use Illuminate\Support\Facades\Log;

function throw_if_fail($condition, ?string $message = null)
{
    if ($condition) {
        $errorMessage = $message ?? "Something went wrong!";
        Log::error($errorMessage); 
        throw new Exception($errorMessage);
    }
}
