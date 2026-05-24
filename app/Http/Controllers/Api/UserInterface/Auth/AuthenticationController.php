<?php

namespace App\Http\Controllers\Api\UserInterface\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\JWTToken;
use App\Mail\SendOTP;
use Exception;
use App\Models\User;
use Firebase\JWT\JWT;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;
use App\Helper\ApiResponse;

class AuthenticationController extends Controller
{
    public function userRegistration(Request $request): JsonResponse
    {
        try {
            $request->validate([
                'email' => 'required|string|email',
                'password' => 'required|string|max:50|min:8',
                'title' => 'nullable|string',
                'phone' => 'nullable|string|max:14|min:11',
            ], [
                // Custom messages
                'email.required' => 'The email address is required.',
                'email.email' => 'Please provide a valid email address.',
                'password.required' => 'Password cannot be empty.',
                'password.min' => 'Password must be at least :min characters long.',
                'password.max' => 'Password cannot exceed :max characters.',
                'phone.min' => 'Phone number must be at least :min digits.',
                'phone.max' => 'Phone number cannot exceed :max digits.',
            ]);
            $password = Hash::make($request->input('password'));
            $user = User::create([
                'title' => $request->input('title'),
                'email' => $request->input('email'),
                'password' => $password,
                'phone' => $request->input('phone')
            ]);
            return ApiResponse::success(message: 'User Create Successfully', data: $user);
        } catch (Exception $exception) {
            //using name parametar
            return ApiResponse::error(error_data: $exception->getMessage());
        }
    }

    public function userLogin(Request $request)
    {
        try {

            $request->validate([
                'email' => 'required|string|email',
                'password' => 'required|string|max:50|min:8'
            ]);
            //            $password = Hash::make();
            $user = User::where('email', '=',  $request->input('email'))->where('password', '=', $request->input('password'))->select('id')->first();
            dd($user);
            if ($user !== null) {
                $token = JWTToken::CreateToken($request->input('email'), $user->id);
                return response()->json(["status" => "success", "message" => "User Login successfully"], 200)->cookie('token', $token, 60 * 60);
            } else {
                return response()->json(["message" => "unauthorized"]);
            }
        } catch (Exception $e) {
            return response()->json(["status" => "fail", "message" => "unauthorized",], 200);
        }
    }
    public function userSendOTP(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|string|email'
            ]);
            $otp = rand(100000, 999999);
            $user = User::where('email', '=', $request->input('email'))->count();
            if ($user == 1) {
                // send opp
                Mail::to($request->input('email'))->send(new SendOTP($otp));
                //set Database otp
                User::where('email', '=', $request->input('email'))->update(['otp' => $otp]);
                return response()->json(["status" => "success", "message" => "Otp Send successfully"], 200);
            } else {
                return response()->json(["status" => "Fail", "message" => "unauthorized"], 200);
            }
        } catch (ValidationException $e) {
            return response()->json(["status" => "fail", "message" => $e->getMessage()], 200);
        } catch (Exception $e) {
            return response()->json(["status" => "fail", "message" => $e->getMessage()], 200);
        }
    }

    public function userVerifyOTP(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|string|email',
                'otp' => 'required|string|max:10|min:6'
            ]);
            $email = $request->input('email');
            $otp = $request->input('otp');
            $count = User::where('email', '=', $email)->where('otp', '=', $otp)->count();
            if ($count == 1) {
                // Update Database otp
                User::where('email', '=', $email)->where('otp', '=', $otp)->update(['otp' => 0]);
                //issu password reset token
                $id = 0;
                $resetToken = JWTToken::CreateTokenForResetPassword($email, $id);
                return response()->json(["status" => "success", "message" => "Otp Verify successfully"], 200)->cookie('token', $resetToken, 60 * 60);
            } else {
                return response()->json(["status" => "Fail", "message" => "unauthorized"], 200);
            }
        } catch (Exception $e) {
            return response()->json(["status" => "Fail", "message" => $e->getMessage()], 401);
        }
    }

    public function userResetPassword(Request $request)
    {
        try {
            //            dd($request->header('email'));
            $request->validate([
                'email' => 'required|string|email',
                'password' => 'required|string|max:50|min:8'
            ]);
            $email = $request->header('email');
            $password = $request->input('password');
            User::where('email', '=', $email)->update(["password" => $password]);
            return response()->json(["status" => "success", "message" => "Password Set Successfully"], 200);
        } catch (Exception $e) {
            return response()->json(["status" => "Fail", "message" => "unauthorized"], 200);
        }
    }
}
