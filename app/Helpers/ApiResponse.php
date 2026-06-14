<?php
namespace App\Helpers;
use Illuminate\Http\JsonResponse;

class ApiResponse
{
    //success response
    static function  success($status = 'success', $message = 'Successful', $data = [], $status_code = 200):JsonResponse{
        return response()->json([
            "status"=> $status,
            "message" => $message,
            "data" => $data
        ],$status_code);
    }
    //error response
    static function  error($status = 'fail', $message = 'something went wrong!', $error_data = [], $status_code = 500):JsonResponse{
        return response()->json([
            "status"=> $status,
            "message" => $message,
            "error" => $error_data
        ],$status_code);
    }
}
