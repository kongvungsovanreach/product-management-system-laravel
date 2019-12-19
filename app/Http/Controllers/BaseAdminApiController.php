<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseAdminApiController extends Controller
{
    public function sendUpdateSuccess($status , $data, $message){
        $response = [
            "status" => $status,
            "message" => $message,
            "data" => $data
        ];
        return response()->json($response, 200);
    }
}
