<?php
namespace App\Helper;

use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JWTToken{
    public static function CreateToken($email, $userId):string
    {
        $key = env('JWT_KEY');
        $payload=[
            'iss'=>"Login-Token",
            'iat'=>time(),
            'exp'=>time()+60*60,
            'email'=>$email,
            'userId'=>$userId
        ];
        return JWT::encode($payload, $key, 'HS256');
    }
    public static function CreateTokenForResetPassword($email,$userId):string
    {
        $key = env('JWT_KEY');
        $payload=[
            'iss'=>"Login-Token",
            'iat'=>time(),
            'exp'=>time()+60*60,
            'email'=>$email,
            'userId'=>'0'
        ];
        return JWT::encode($payload, $key, 'HS256');
    }
    public static function verifyToken($token)
    {
        try{
            if($token==null){
                return "unauthorized";
            }else{
                $key = env('JWT_KEY');
                $decode = JWT::decode($token, new Key($key, 'HS256'));
                return $decode;
            }

        }catch(Exception $e){
            return "unauthorized";
        }
    }
}
