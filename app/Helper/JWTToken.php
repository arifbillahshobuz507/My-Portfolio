<?php

namespace App\Helper;

use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Http\JsonResponse;

class JWTToken
{
    public static function CreateToken($email, $userId): JsonResponse
    {
        try {
            $key = env('JWT_KEY');
            if (!$key) {
                return ApiResponse::Error(message: 'JWT_KEY not configured');
            }
            $payload = [
                'iss' => "Login-Token",
                'iat' => time(),
                'exp' => time() + 60 * 60,
                'email' => $email,
                'userId' => $userId
            ];
            $token = JWT::encode($payload, $key, 'HS256');
            //using name parametar
            return ApiResponse::success(message: 'JWT token Creation Successfully', data: $token);
        } catch (Exception $e) {
            //using name parametar
            return ApiResponse::Error(message: 'JWT token Creation failed', error_data: $e->getMessage());
        }
    }
    public static function CreateTokenForResetPassword($email, $userId): JsonResponse
    {
        try {
            $key = env('JWT_KEY');
            if (!$key) {
                return ApiResponse::Error(message: 'JWT_KEY not configured');
            }
            $payload = [
                'iss' => "Password-Reset-Token",
                'iat' => time(),
                'exp' => time() + 60 * 60,
                'email' => $email,
                'userId' => $userId
            ];
            $token = JWT::encode($payload, $key, 'HS256');
            return ApiResponse::success(message: 'JWT token Creation Successfully', data: $token);
        } catch (Exception $e) {
            //using name parametar
            return ApiResponse::Error(message: 'JWT token Creation failed', error_data: $e->getMessage());
        }
    }
    public static function verifyToken($token): JsonResponse
    {
        try {
            if ($token == null) {
                return ApiResponse::Error(message: 'unauthorized', status_code: 401);
            } else {
                $key = env('JWT_KEY');
                if (!$key) {
                    return ApiResponse::Error(message: 'JWT_KEY not configured');
                }
                $decode = JWT::decode($token, new Key($key, 'HS256'));
                return ApiResponse::success(message: 'JWT token decode Successfully', data: $decode);
            }
        } catch (Exception $e) {
            return ApiResponse::Error(message: 'JWT token decode failed', error_data: $e->getMessage(), status_code: 401);
        }
    }
}
