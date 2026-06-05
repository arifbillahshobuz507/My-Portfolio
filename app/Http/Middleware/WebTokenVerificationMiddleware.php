<?php

namespace App\Http\Middleware;

use App\Helper\ApiResponse;
use App\Helper\JWTToken;
use Closure;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;

class WebTokenVerificationMiddleware
{
      public function handle(Request $request, Closure $next): Response |View
    {
        $token = $request->bearerToken()
            ?? $request->cookie("token")
            ?? $request->header("token");
        
        if (!$token) {
            if ($request->expectsJson() || $request->is('api/*')) {
                return ApiResponse::error(message: "unauthorized", status_code: 401);
            }
            return redirect('/login');
        }
        
        $result = JWTToken::verifyToken($token);
        
        if ($result === "unauthorized") {
            if ($request->expectsJson() || $request->is('api/*')) {
                 return ApiResponse::error(message: "unauthorized", status_code: 401);
            }
            return redirect('/login');
        }
        
        $request->headers->set('email', $result->email);
        $request->headers->set('user_id', $result->userId);
        
        return $next($request);
    }
}
