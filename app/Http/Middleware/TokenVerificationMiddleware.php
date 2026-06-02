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
    // Try to get token from different sources in order of priority
    $bearerToken = $request->bearerToken();
    $cookieToken = $request->cookie("token");
    $headerToken = $request->header("token");
    
    // Check Bearer token first (most common)
    if ($bearerToken) {
        $token = $bearerToken;
        $result = JWTToken::verifyToken($token);
        
        if ($result !== "unauthorized") {
            $request->headers->set('email', $result->email);
            $request->headers->set('user_id', $result->userId);
            return $next($request);
        } else {
            return ApiResponse::error(message: "unauthorized", status_code: 401);
        }
    }
    
    // Check Cookie token second
    if ($cookieToken) {
        $result = JWTToken::verifyToken($cookieToken);
        
        if ($result !== "unauthorized") {
            $request->headers->set('email', $result->email);
            $request->headers->set('user_id', $result->userId);
            return $next($request);
        } else {
            return ApiResponse::error(message: "unauthorized", status_code: 401);
        }
    }
    
    // Check Header token third
    if ($headerToken) {
        $result = JWTToken::verifyToken($headerToken);
        
        if ($result !== "unauthorized") {
            $request->headers->set('email', $result->email);
            $request->headers->set('user_id', $result->userId);
            return $next($request);
        } else {
            return ApiResponse::error(message: "unauthorized", status_code: 401);
        }
    }
    
    // No token found in any source
    return ApiResponse::error(message: "No token provided", status_code: 401);
}
}
