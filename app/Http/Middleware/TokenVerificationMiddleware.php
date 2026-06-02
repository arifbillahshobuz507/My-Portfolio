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
        // Try to get token from different sources
        $token = $request->bearerToken()
            ?? $request->cookie("token")
            ?? $request->header("token");

        if (!$token) {
            return ApiResponse::error(message: "No token provided", status_code: 401);
        }

        $result = JWTToken::verifyToken($token);

        if ($result === "unauthorized") {
            return ApiResponse::error(message: "unauthorized", status_code: 401);
        }

        $request->headers->set('email', $result->email);
        $request->headers->set('user_id', $result->userId);

        return $next($request);
    }
}
