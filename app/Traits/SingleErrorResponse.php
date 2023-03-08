<?php

namespace App\Traits;

use App\Models\Point;

trait SingleErrorResponse
{
    public function eMessage($message,$code=400){
        return response()->json([
            'error' => $message
        ],$code);
    }
}
