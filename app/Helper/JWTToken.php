<?php

namespace App\Helper;

use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JWTToken
{
       public static function CreateToken($email, $userId): string
    {
        try {
            $key = env('JWT_KEY');
            if (!$key) {
                return 'JWT_KEY not configured';
            }
            $payload = [
                'iss' => "Login-Token",
                'iat' => time(),
                'exp' => time() + (60 * 60 * 24 * 365),
                'email' => $email,
                'userId' => $userId
            ];
            return JWT::encode($payload, $key, 'HS256');
        } catch (Exception $e) {
             return 'JWT token Creation failed' . ' ' . $e->getMessage() ;
        }
    }
    public static function CreateTokenForResetPassword($email, $userId): string
    {
        try {
            $key = env('JWT_KEY');
            if (!$key) {
                  return 'JWT_KEY not configured';
            }
            $payload = [
                'iss' => "Password-Reset-Token",
                'iat' => time(),
                'exp' => time() + 50 * 60, //for 5minutes
                'email' => $email,
                'userId' => $userId
            ];
              return JWT::encode($payload, $key, 'HS256');
        } catch (Exception $e) {
            return 'JWT token Creation failed' . ' ' . $e->getMessage() ;
        }
    }
    public static function verifyToken($token):string|object 
    {
        try {
            if ($token == null) {
                return 'Token not found';
            } else {
                $key = env('JWT_KEY');
                if (!$key) {
                      return 'JWT_KEY not configured';
                } 
                    return JWT::decode($token, new Key($key, 'HS256'));
            }
        } catch (Exception $e) {
              return 'unauthorized';
        }
    }
}
