<?php

namespace App\Trait;

trait ApiResponse
{
    public function ApiResponse($data = [], $message = '', $status = true, $code = 200)
    {
        return response()->json([
            'status' => $status,
            'message' => $message,
            'data' => $data
        ], $code);
    }
}
