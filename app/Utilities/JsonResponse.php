<?php

namespace App\Utilities;

class JsonResponse
{

    public static function send($code = 200, $data = null, $error = null)
    {
        $response = [
            'status' => ($code === 200 ? true : false),
            'response' => $data,
            'error' => $error  
        ];

        return response()->json($response, $code);

    }
}
