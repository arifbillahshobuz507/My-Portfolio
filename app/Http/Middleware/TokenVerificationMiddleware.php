<?php

namespace App\Http\Middleware;

use App\Helper\ApiResponse;
use App\Helper\JWTToken;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TokenVerificationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->bearerToken();
        $result = JWTToken::verifyToken($token);
        if($result !=="unauthorized"){
            $request->headers->set('email', $result->email);
            $request->headers->set('user_id', $result->userId);             
            return $next($request);           
        } else{
            //using name parametar
            return ApiResponse::error(message:"unauthorized", status_code:401);
        }
    }
}
