<?php

namespace App\Http\Controllers\backend;

use App\Helper\JWTToken;
use App\Mail\SendOTP;
use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Firebase\JWT\JWT;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    // Auth View
    public function userRegistrationPage(){
        return view('auth.content.registration-page');
    }
    public function userLoginPage(){
        return view('auth.content.login-page');
    }
    public function userSendOTPPage(){
        return view('auth.content.send-otp-page');
    }
    public function userVerifyOTPPage(){
        return view('auth.content.verify-otp-page');
    }
    public function userResetPasswordPage(){
        return view('auth.content.reset-pass-page');
    }

    public function index()
    {
        try {
            $data = User::all();
            return view('view', compact('data'));
        } catch (Exception $exception) {
            return redirect()->back()->with(['error' => $exception->getMessage()])->withInput();
        }
    }

    public function addUser()
    {
        try {
            return view("view");
        } catch (Exception $exception) {
            return redirect()->back()->with(['error' => $exception->getMessage()])->withInput();
        }
    }

    public function editUser($id)
    {
        try {
            $data = User::findOrFail($id);
            return view("view", compact('data'));
        } catch (Exception $exception) {
            return redirect()->back()->with(['error' => $exception->getMessage()])->withInput();
        }
    }

    public function deleteUser(Request $request)
    {
        try {
            $data = User::findOrFail($request->id);
            $data->delete();
            return response()->json(['success' => true]);
        } catch (Exception $exception) {
            return response()->json([
                'status' => 'fail',
                'message' => $exception->getMessage()
            ]);
        }
    }

    public function userRegistration(Request $request): JsonResponse
    {
        try {
            $request->validate([
                'email' => 'required|string|email',
                'password' => 'required|string|max:50|min:8',
                'title' => 'nullable|string',
                'phone' => 'nullable|string|max:14|min:11',
            ]);
           $password = Hash::make( $request->input('password'));
            User::create([
                'title' => $request->input('title'),
                'email' => $request->input('email'),
                'password' => $password,
                'phone' => $request->input('phone')
            ]);
            return response()->json(["status" => "success", "message" => "User Create Successfully"], 200);
            // return redirect()->route('name')->with(['success'=>"User Create Successfully"],200);
        } catch (ValidationException $validationException) {
            return response()->json(["status" => "Fail", "message" => $validationException->getMessage()], 200);
        } catch (Exception $exception) {
            return response()->json(["status" => "Fail", "message" => $exception->getMessage()], 200);
            // return redirect()->back()->with('error', $exception->getMessage())->withInput();
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
         dd( $user );
            if ($user !== null) {
                $token = JWTToken::CreateToken($request->input('email'), $user->id);
                return response()->json(["status" => "success", "message" => "User Login successfully"], 200)->cookie('token',$token,60*60);
            } else {
                return response()->json(["message" => "unauthorized"]);
            }
        } catch (Exception $e) {
            return response()->json(["status" => "fail", "message" =>"unauthorized", 'error'=> $e->getMessage], 200);
        }
    }
    public function userSendOTP(Request $request)
    {
        try{
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
        }catch(ValidationException $e){
            return response()->json(["status" => "fail", "message" => $e->getMessage()], 200);
        }
         catch(Exception $e){
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
                $id=0;
                $resetToken = JWTToken::CreateTokenForResetPassword($email,$id);
                return response()->json(["status" => "success", "message" => "Otp Verify successfully"], 200)->cookie('token', $resetToken,60*60);
            } else {
                return response()->json(["status" => "Fail", "message" => "unauthorized"],200);
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

    public function updateUser(Request $request, $id)
    {
        try {
            $data = User::findOrFail($id);
            $request->validate([
                'from' => 'required'
            ]);
            $fileName = $data->image;
            if ($request->hasFile('image')) {
                $request->validate([
                    'image' => 'required'
                ]);
                if (file_exists(public_path('image/' . $fileName))) {
                    unlink(public_path('image/' . $fileName));
                }
                $file = $request->file('image');
                $fileName = date('Ymdhis') . '.' . $file->getClientOriginalExtension();
                $file->move("image/", $fileName);
            }
            $data->update([
                'database' => $request->input('from'),
                'image' => $fileName
            ]);
            return redirect()->route('name')->with(['success' => "demo Update Successfully"], 200);
        } catch (ValidationException $validationException) {
            return redirect()->back()->with('error', $validationException->getMessage())->withInput();
        } catch (Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage())->withInput();
        }
    }
    public function userLogout(Request $request)
    {
        return redirect('login')->cookie('token','',-1);
    }
}
