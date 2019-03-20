<?php

namespace App\Utilities;

trait JsonResponse 
{

    public function sendResponse($code = 200, $data, $error)
    {
        $response = [
            'status' => ($code === 200 ? true : false),
            'response' => $data,
            'error' => $error  
        ];
       dd($response);
        return response()->json($response, $code);

    }
}
