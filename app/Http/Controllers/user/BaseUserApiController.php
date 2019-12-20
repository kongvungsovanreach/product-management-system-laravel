<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BaseUserApiController extends Controller
{
    public function sendShowSuccess($status , $data, $message){
        $response = [
            "status" => $status,
            "message" => $message,
            "data" => $data
        ];
        return response()->json($response, 200);
    }
}
