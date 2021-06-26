<?php

namespace App\Traits;

trait ResponseCode
{

    public function success($result, $message)
    {
        $response = [
            'code' => 201,
            'status' => true,
            'data' => $result,
            'message' => $message
        ];
        return response()->json($response);
    }

    public function failure($result, $message)
    {
        $response = [
            'code' => 400,
            'status' => 'error',
            'data' => $result,
            'message' => $message
        ];
        return response()->json($response);
    }
}
