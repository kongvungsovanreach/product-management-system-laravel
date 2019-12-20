<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BaseAdminApiController extends Controller
{
    public function sendFetchSuccess($status , $data, $message){
        $response = [
            "status" => $status,
            "message" => $message,
            "data" => $data
        ];
        return response()->json($response, 200);
    }
    public function sendUpdateSuccess($status , $data, $message){
        $response = [
            "status" => $status,
            "message" => $message,
            "data" => $data
        ];
        return response()->json($response, 200);
    }
    public function sendDeleteSuccess($status , $message){
        $response = [
            "status" => $status,
            "message" => $message,
        ];
        return response()->json($response, 200);
    }
}
