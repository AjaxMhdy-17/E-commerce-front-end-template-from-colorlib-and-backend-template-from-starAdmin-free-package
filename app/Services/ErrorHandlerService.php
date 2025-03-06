<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use Exception;

class ErrorHandlerService
{
    
    public static function handle(\Closure $callback, ?string $customMessage = null)
    {
        try {
            return $callback();
        } catch (Exception $exp) {
            Log::error($exp->getMessage(), ['exception' => $exp]);
            $errorMessage = $customMessage ?? $exp->getMessage() ?? "Something went wrong!";
            return back()->with('error', $errorMessage);
        }
    }
}
