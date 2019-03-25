<?php

namespace App\Utilities;



use Illuminate\Support\Facades\Request;

class Response
{

    public static function send($code = 200, $data = null, $error = null)
    {
        $response = [
            'status' => ($code >= 200 && $code < 400 ? true : false),
            'response' => $data,
            'error' => $error  
        ];

        if(Request::wantsJson())
            return response()->json($response, $code);

        else
            return "Unsupported content type";
    }
}
